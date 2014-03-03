<?php
/**
 * GMW FL Widget - Single member location widget
 * @version 1.0
 * @author Eyal Fitoussi
 */
class GMW_Member_Location_Widget extends WP_Widget {
	
	/**
	 * __constructor
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
				'gmw_member_location_widget', // Base ID
				__('GMW BP member\'s Location', 'GMW'), // Name
				array( 'description' => __( 'Displays BP Member\'s Location', 'GMW' ), ) // Args
		);
	}
	
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	function widget($args, $instance) {
		
		if( bp_is_user() ) {
			
			global $bp;
			
			extract( $args );

			$map_height 	= $instance['map_height'];
			$map_width 	= $instance['map_width'];
			$directions	= $instance['directions'];
			$map_type	= $instance['map_type'];
			$address	= $instance['address'];
			$no_location	= $instance['no_location'];
			$zoom_level	= $instance['zoom_level'];
			$address_fields = $instance['address_fields'];
			
			if ( !isset( $no_location ) ) :
				
				$member_id = $bp->displayed_user->id;
			
				$member_info = gmw_get_member_location_from_db( $member_id );
			
				if ( !isset( $member_info ) || empty( $member_info ) ) return; 
			
			endif;
			
			echo $before_widget;

			echo $before_title . $bp->displayed_user->fullname . '&#39;s Location' . $after_title;

			$mAddress = ( isset( $address_fields ) && !empty($address_fields) ) ? implode(',',$address_fields) : 'street,city,state,zipcode,country';
			
			echo do_shortcode( '[gmw_member_location widget="1" address_fields="' . $mAddress . '" map_width="'.$map_width.'" map_height="'.$map_height.'" address="'.$address.'" map_type="'.$map_type.'" directions="'.$directions.'" no_location="'.$no_location.'" zoom_level="'.$zoom_level.'"]');
		
			echo $after_widget;
		}
	}
	
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	function form($instance) {
		
		$defaults = array( 'title' => 'Location');
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
			<p>
		    	<label><?php echo  _e( 'Map Width: ( ex. 200px or 100% )', 'GMW' ); ?></label>
		    	<span>
					<input type="text" name="<?php if ( isset($this) ) echo $this->get_field_name('map_width'); ?>" value="<?php if ( isset( $instance['map_width'] ) && !empty( $instance['map_width'] ) ) echo $instance['map_width']; ?>" class="widefat" />
				</span>
			</p>
			<p>
		    	<label><?php echo  _e( 'Map Height: ( ex. 200px or 100% )','GMW' ); ?></label>
				<span>
					<input type="text" name="<?php if ( isset($this) ) echo $this->get_field_name('map_height'); ?>" value="<?php if ( isset( $instance['map_height'] ) && !empty( $instance['map_height'] ) ) echo $instance['map_height']; ?>" class="widefat" />
				</span>
			</p>
			
			<p>
		    	<input type="checkbox" value="1" name="<?php echo $this->get_field_name('directions'); ?>" <?php if ( isset( $instance["directions"] ) ) echo 'checked="checked"'; ?> class="widefat" />
		    	<label><?php echo  _e('Show Directions Link.','GMW' ); ?></label>
			</p>
			<p>
		    	<input type="checkbox" value="1" name="<?php echo $this->get_field_name('address'); ?>" <?php if ( isset( $instance["address"] ) ) echo 'checked="checked"'; ?> class="widefat" />
		    	<label><?php echo  _e( 'Show Address.','GMW' ); ?></label>
			</p>
			
			<p>
		    	<input type="checkbox" value="1" name="<?php echo $this->get_field_name('no_location'); ?> <?php if ( isset( $instance["no_location"] ) ) echo 'checked="checked"'; ?> class="widefat" />
		    	<label><?php echo  _e( 'Show "No  location" message.','GMW' ); ?></label>
			</p>
			
			<p>
			<label><?php echo _e( 'Zoom Level','GMW' ); ?>:</label>
				<select name="<?php echo $this->get_field_name('zoom_level'); ?>">
					<?php for($i=1; $i< 18; $i++): ?>
					<option value="<?php echo $i; ?> " <?php if ( isset($instance['zoom_level'] ) && $instance['zoom_level'] == $i ) echo "selected"; ?>><?php echo $i; ?></option>
					<?php endfor; ?> 
				</select>
			</p>
			
			<p>
			<label><?php echo _e( 'Map Type','GMW'); ?>:</label>
				<select name="<?php echo $this->get_field_name('map_type'); ?>">
					<?php echo '<option value="ROADMAP"'; if ( isset( $instance['map_type'] ) && $instance['map_type'] == "ROADMAP" ) echo 'selected="selected"'; echo '>ROADMAP</options>'; ?>
					<?php echo '<option value="SATELLITE"'; if ( isset( $instance['map_type'] ) && $instance['map_type'] == "SATELLITE" ) echo 'selected="selected"'; echo '>SATELLITE</options>'; ?>
					<?php echo '<option value="HYBRID"'; if ( isset( $instance['map_type'] ) && $instance['map_type'] == "HYBRID" ) echo 'selected="selected"'; echo '>HYBRID</options>'; ?>
					<?php echo '<option value="TERRAIN"'; if ( isset( $instance['map_type'] ) && $instance['map_type'] == "TERRAIN" ) echo 'selected="selected"'; echo '>TERRAIN</options>'; ?>
				</select>
			</p>
			
			<?php do_action('gmw_fl_single_member_widget_admin_after_map_type', $this->id_base, $this->number, $instance); ?>
	<?php } 
	
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	function update($new_instance, $old_instance) {
		//$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['map_height'] 	= $new_instance['map_height'];
		$instance['map_width']		= $new_instance['map_width'];
		$instance['directions']		= $new_instance['directions'];
		$instance['map_type']		= $new_instance['map_type'];
		$instance['address']		= $new_instance['address'];
		$instance['no_location']	= $new_instance['no_location'];
		$instance['zoom_level']		= $new_instance['zoom_level'];
		$instance['address_fields']	= $new_instance['address_fields'];
		
		return $instance;
	}

}
?>