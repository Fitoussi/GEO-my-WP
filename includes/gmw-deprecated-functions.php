<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GMW {

	public function __construct() {

		trigger_error( 'GMW class is deprecated since GEO my WP version 3.0. Use GMW_Form instead.', E_USER_NOTICE );
	}
}

function gmw_get_search_form_radius_values( $gmw = array() ) {
	_deprecated_function( 'gmw_get_search_form_radius_values', '3.0', 'gmw_get_search_form_radius' );
	return gmw_get_search_form_radius( $gmw );
}

function gmw_search_form_radius_values( $gmw = array() ) {
	_deprecated_function( 'gmw_search_form_radius_values', '3.0', 'gmw_search_form_radius' );
	return gmw_search_form_radius( $gmw );
}

function gmw_search_form_locator_icon( $gmw=array(), $class=false ) {
	_deprecated_function( 'gmw_search_form_locator_icon', '3.0', 'gmw_search_form_locator_button' );
	return gmw_search_form_locator_button( $gmw, $class );
}

function gmw_form_set_labels( $form = array() ) {
	_deprecated_function( 'gmw_form_set_labels', '3.0', 'gmw_get_labels' );
	return gmw_get_labels( $form );
}

function gmw_get_additional_info( $info, $gmw = array(), $fields = array(), $labels = array(), $tag='div' ) {
	_deprecated_function( 'gmw_get_additional_info', '3.0', 'gmw_get_location_meta_output' );
	return gmw_get_location_meta_output( $info, $fields, $labels, $tag, $gmw );
}

function gmw_additional_info( $info, $gmw = array(), $fields = array(), $labels = array(), $tag='div' ) {
	_deprecated_function( 'gmw_additional_info', '3.0', 'gmw_location_meta_output' );
	gmw_location_meta_output( $info, $fields, $labels, $tag, $gmw );
}

/**
 * GMW PT function - get post location from database or cache
 * @param $post_id
 */
function gmw_get_post_location_from_db( $post_id = 0 ) {
	_deprecated_function( 'gmw_get_post_location_from_db', '3.0', 'gmw_get_post_location' );
	return gmw_get_post_location( $post_id );
}

/**
 * GMW FL function - get members location from database or cache
 * @param unknown_type $user_id
 */
function gmw_get_member_info_from_db( $user_id = 0 ) {

    _deprecated_function( 'gmw_get_member_location_from_db', '3.0', 'gmw_get_user_location' );
	return gmw_get_user_location( $user_id );
}

/**
 * GMW PT function - get post location from database or cache
 * @param $post_id
 */
function gmw_get_post_info( $args = array() ) {
	trigger_error( 'gmw_get_post_info function is deprecated since GEO my WP version 3.0. Please use gmw_get_post_address instead.', E_USER_NOTICE );

	if ( function_exists( 'gmw_get_post_address' ) ) {

		$attr = array(
			'post_id'   => ! empty( $args['post_id'] ) ? $args['post_id'] : 0,
        	'fields'    => ! empty( $args['info'] )    ? $args['info']    : 'formatted_address',
        	'separator' => ! empty( $args['divider'] ) ? $args['divider'] : ', '
        );

		return gmw_get_post_address( $attr );
	}

	return;
}
add_shortcode( 'gmw_post_info', 'gmw_get_post_info' );

function gmw_post_info( $args = array() ) {

	if ( function_exists( 'gmw_post_address' ) ) {

		_deprecated_function( 'gmw_post_info', '3.0', 'gmw_post_address' );
		echo gmw_post_address( $args );
	}
}

/**
 * GMW FL function - display members's info
 */
function gmw_get_member_info( $args = array() ) {

	trigger_error( 'gmw_get_member_info function is deprecated since GEO my WP version 3.0. Please use gmw_get_user_address instead.', E_USER_NOTICE );

	if ( function_exists( 'gmw_get_user_address' ) ) {

		$attr = array(
			'user_id'   => ! empty( $args['user_id'] ) ? $args['user_id'] : 0,
        	'fields'    => ! empty( $args['info'] )    ? $args['info']    : 'formatted_address',
        	'separator' => ! empty( $args['divider'] ) ? $args['divider'] : ', '
        );

		return gmw_get_user_address( $attr );
	}

	return;
}
add_shortcode('gmw_member_info', 'gmw_get_member_info');

function gmw_fl_member_info( $args = array() ) {

	if ( function_exists( 'gmw_user_address' ) ) {
		_deprecated_function( 'gmw_fl_member_info', '3.0', 'gmw_user_address' );
    	echo gmw_user_address( $args );
    }
}

function gmw_pt_update_location( $args = array(), $force_refresh = false ) {
	
	_deprecated_function( 'gmw_pt_update_location', '3.0', 'gmw_update_post_location' );

	if ( function_exists( 'gmw_update_post_location' ) ) {

		$post_id = ! empty( $args['post_id'] ) ? $args['post_id'] : false;
		$address = ! empty( $args['address'] ) ? $args['address'] : false;

		gmw_update_post_location( $post_id, $address, $force_refresh );

		if ( ! empty( $args['additional_info'] ) ) {
			gmw_update_post_location_meta( $post_id, $args['additional_info'] );
		}
		
	}
}

/**
 * GMW deprecated function - Display radius distance.
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_pt_by_radius( $gmw, $post ) {
	_deprecated_function( 'gmw_pt_by_radius', '2.5', 'gmw_distance_to_location' );
	gmw_distance_to_location( $post, $gmw );
}

function gmw_pt_thumbnail( $gmw, $post ) {
	if ( !isset( $gmw['search_results']['featured_image']['use'] ) || !has_post_thumbnail( $post-> ID ) )
		return;
	_deprecated_function( 'gmw_pt_thumbnail', '2.5', 'the_post_thumbnail' );
	the_post_thumbnail( array( $gmw['search_results']['featured_image']['width'], $gmw['search_results']['featured_image']['height'] ) );
}

function gmw_pt_form_get_post_types_dropdown( $gmw, $title=false, $class=false, $label=false ) {
	_deprecated_function( 'gmw_pt_form_get_post_types_dropdown', '3.0', 'gmw_get_search_form_post_types' );
	return gmw_get_search_form_post_types( $gmw );
}

function gmw_pt_form_post_types_dropdown( $gmw, $title=false, $class=false, $label=false ) {
	_deprecated_function( 'gmw_pt_form_post_types_dropdown', '3.0', 'gmw_search_form_post_types' );
	gmw_search_form_post_types( $gmw );
}

function gmw_pt_get_form_taxonomies( $gmw, $tag = 'div', $class = false ) {
	_deprecated_function( 'gmw_pt_get_form_taxonomies', '3.0', 'gmw_get_search_form_taxonomies' );
	return gmw_get_search_form_taxonomies( $gmw, $tag = 'div' );
}

function gmw_pt_form_taxonomies( $gmw, $tag = 'div', $class = false ) {
	_deprecated_function( 'gmw_pt_form_taxonomies', '3.0', 'gmw_search_form_taxonomies' );
	gmw_search_form_taxonomies( $gmw, $tag = 'div' );
}

function gmw_pt_get_taxonomies( $gmw, $post ) {
	_deprecated_function( 'gmw_pt_get_taxonomies', '3.0', 'gmw_get_taxonomies_list' );
	return gmw_get_taxonomies_list( $post, $gmw );
}

function gmw_pt_taxonomies( $gmw, $post ) {
	_deprecated_function( 'gmw_pt_taxonomies', '3.0', 'gmw_taxonomies_list' );
	gmw_taxonomies_list( $post, $gmw );
}

function gmw_pt_get_days_hours( $post, $gmw ) {
	_deprecated_function( 'gmw_pt_get_days_hours', '3.0', 'gmw_get_opening_hours' );
	return gmw_get_opening_hours( $post, $gmw );
}

function gmw_pt_days_hours( $post, $gmw ) {
	_deprecated_function( 'gmw_pt_days_hours', '3.0', 'gmw_opening_hours' );
	gmw_opening_hours( $post, $gmw );
}



/**
 * GMW deprecated function - Additional information.
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_pt_additional_info( $gmw, $post, $tag ) {
	_deprecated_function( 'gmw_pt_additional_info', '2.5', 'gmw_additional_info' );
	gmw_additional_info( $post, $gmw, $gmw['search_results']['additional_info'], $gmw['labels']['search_results']['contact_info'], $tag );
}

/**
 * GMW deprecated function - Excerpt from content.
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_pt_excerpt( $gmw, $post ) {
	_deprecated_function( 'gmw_pt_excerpt', '2.5', 'gmw_excerpt' );
	if ( !isset( $gmw['search_results']['excerpt']['use'] ) )
		return;
	gmw_excerpt( $post, $gmw, $post->post_content, $gmw['search_results']['excerpt']['count'] );
}

/**
 * GMW deprecated function - results message.
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_pt_within( $gmw, $sm, $om, $rm, $wm, $fm, $nm ) {
	_deprecated_function( 'gmw_pt_within', '2.5', 'gmw_results_message' );
	gmw_results_message( $gmw, false );
}

/**
 * GMW deprecated function - get directions link
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_pt_directions( $gmw, $post, $title ) {
	if ( !isset( $gmw['search_results']['get_directions'] ) )
		return;
	_deprecated_function( 'gmw_pt_directions', '2.5', 'gmw_directions_link' );
	gmw_directions_link( $post, $gmw, $title );
}

/**
 * GMW deprecated function - get driving distance
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_pt_driving_distance( $gmw, $post, $class, $title ) {
	if ( !isset( $gmw['search_results']['by_driving'] ) || $gmw['units_array'] == false )
		return;
	_deprecated_function( 'gmw_pt_driving_distance', '2.5', 'gmw_driving_distance' );
	gmw_driving_distance( $post, $gmw, $title );	
}

/**
 * GMW deprecated function - pagination
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_pt_paginations( $gmw ) {
	_deprecated_function( 'gmw_pt_paginations', '2.5', 'gmw_pagination' );
	gmw_pagination( $gmw, 'paged', $gmw['max_pages'] );
}

/**
 * GMW deprecated function - Per page dropdown
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_pt_per_page_dropdown( $gmw, $class ) {
	_deprecated_function( 'gmw_pt_per_page_dropdown', '2.5', 'gmw_per_page' );
	gmw_per_page( $gmw, $gmw['total_results'], 'paged' );
}

/**
 * GMW deprecated function - Per page dropdown
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_fl_per_page_dropdown( $gmw, $class ) {
	_deprecated_function( 'gmw_fl_per_page_dropdown', '2.5', 'gmw_per_page' );
	global $members_template;
	gmw_per_page( $gmw, $members_template->total_member_count, 'upage' );
}
	
/**
 * GMW deprecated function - Display user's full address
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_fl_member_address( $gmw ) {
	_deprecated_function( 'gmw_fl_member_address', '2.5', 'gmw_location_address' );
	global $members_template;
	gmw_location_address( $members_template->member, $gmw );
}

/**
 * GMW deprecated function - Display distance from user
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_fl_by_radius( $gmw ) {
	_deprecated_function( 'gmw_fl_by_radius', '2.5', 'gmw_distance_to_location' );
	global $members_template;
	gmw_distance_to_location( $members_template->member, $gmw );
}

/**
 * GMW deprecated function - directions link to user
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_fl_directions_link( $gmw, $title ) {
	if ( !isset( $gmw['search_results']['get_directions'] ) )
		return;
	global $members_template;
	_deprecated_function( 'gmw_fl_directions_link', '2.5', 'gmw_directions_link' );
	gmw_directions_link( $members_template->member, $gmw, $title );
}

/**
 * GMW deprecated function - results message.
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_fl_wihtin_message( $gmw ) {
	global $members_template;
	_deprecated_function( 'gmw_fl_within_message', '2.5', 'gmw_results_message' );
	gmw_results_message( $gmw, false );
}

function gmw_fl_driving_distance( $gmw, $member ) {
	if ( !isset( $gmw['search_results']['by_driving'] ) || $gmw['units_array'] == false )
		return;
	global $members_template;
	_deprecated_function( 'gmw_fl_driving_distance', '2.5', 'gmw_driving_distance' );
	gmw_driving_distance( $members_template->member, $gmw, false);
}

/**
 * GMW deprecated function - display members count
 * @para  $gmw
 * @param $gmw_options
 */
function gmw_fl_member_count($gmw) {
	global $members_template;
	_deprecated_function( 'gmw_fl_member_count', '2.5', 'member->member_count' );
	echo $members_template->member->member_count;
}

/**
 * GMW deprecated function - no members found
 */
function gmw_fl_no_members( $gmw ) {
	_deprecated_function( 'gmw_fl_no_members', '2.5', 'gmw_no_results_found' );
	gmw_no_results_found( $gmw, $gmw['labels']['search_results']['fl_no_results'] );
}

/*
 *GMW Users Geolocation deprecated functions 
 */
	
/**
 * GMW deprecated function - pagination
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_ug_paginations( $gmw ) {
	_deprecated_function( 'gmw_ug_paginations', '2.5', 'gmw_pagination' );
	gmw_pagination( $gmw, 'paged', $gmw['max_pages'] );
}

/**
 * GMW UG deprecated function - Display Radius distance
 * @since 1.0
 * @author Eyal Fitoussi
 */
function gmw_ug_by_radius( $gmw, $user ) {
	_deprecated_function( 'gmw_ug_by_radius', '2.5', 'gmw_distance_to_location' );
	gmw_distance_to_location( $user, $gmw );
}

/**
 * GMW UG deprectated function - Get directions.
 * @since 1.0
 * @author Eyal Fitoussi
 */
function gmw_ug_directions( $gmw, $user, $title ) {
	if ( !isset( $gmw['search_results']['get_directions'] ) )
		return;

	if ( empty( $title ) )
		$title = $gmw['labels']['search_results']['directions'];

	_deprecated_function( 'gmw_ug_directions', '2.5', 'gmw_directions_link' );
	gmw_directions_link( $user, $gmw, $title );
}

/**
 * GMW GL deprecated function - driving distance
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_ug_driving_distance( $gmw, $user ) {
	if ( !isset( $gmw['search_results']['by_driving'] ) || $gmw['units_array'] == false )
		return;

	_deprecated_function( 'gmw_ug_driving_distance', '2.5', 'gmw_driving_distance' );
	gmw_driving_distance( $user, $gmw, false);
}

/**
 * GMW GL deprecated function - display within distance message
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_ug_within( $gmw, $sm, $om, $rm , $wm, $fm, $nm ) {
	_deprecated_function( 'gmw_ug_within', '2.5', 'gmw_results_message' );
	gmw_results_message( $gmw, false );
}

/**
 * GMW deprecated function - Per page dropdown
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_ug_per_page( $gmw, $class ) {
	_deprecated_function( 'gmw_ug_per_page_dropdown', '2.5', 'gmw_per_page' );
	gmw_per_page( $gmw, $gmw['total_user_count'], 'paged' );
}

/**
 * GMW deprecated function - avatar
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_ug_avatar( $gmw, $user ) {
	_deprecated_function( 'gmw_ug_avatar', '2.5', 'get_avatar' );
	echo get_avatar( $user->ID, $gmw['search_results']['avatar']['width'] );
}

/*
 *groups locator 
 */
/**
 * GMW GL function - Display group's full address
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_gl_group_address( $gmw ) {
	global $groups_template;
	_deprecated_function( 'gmw_gl_group_address', '2.5', 'gmw_location_address' );
	gmw_location_address( $groups_template->group, $gmw );
}

/**
 * GMW GL function - Display Radius distance
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_gl_by_radius($gmw) {
	_deprecated_function( 'gmw_gl_by_radius', '2.5', 'gmw_distance_to_location' );
	global $groups_template;
	gmw_distance_to_location( $groups_template->group, $gmw );
}

/**
 * GMW GL function - "Get directions" link
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_gl_get_directions($gmw) {
	if ( !isset( $gmw['search_results']['get_directions'] ) )
		return;

	global $groups_template;
	if ( empty( $title ) )
		$title = 'Get directions';

	_deprecated_function( 'gmw_gl_get_directions', '2.5', 'gmw_directions_link' );
	gmw_directions_link( $groups_template->group, $gmw, $title );
}

/**
 * GMW GL function - display within distance message
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_gl_within_message( $gmw ) {
	_deprecated_function( 'gmw_gl_within_message', '2.5', 'gmw_results_message' );
	gmw_results_message( $gmw, false );
}

/**
 * Deprecated  - for older versions
 */
function gmgl_distance( $group, $gmw ) {
	_deprecated_function( 'gmgl_distance', '2.5', 'gmw_distance_to_location' );
	gmw_distance_to_location( $group, $gmw );
}

/**
 * Deprecated - for older versions
 */
function gmgl_get_directions( $group, $gmw, $title ) {
	_deprecated_function( 'gmgl_get_directions', '2.5', 'gmw_get_directions_link' );
	echo gmw_get_directions_link(  $group, $gmw, $title );
}

function gmw_gl_driving_distance( $gmw, $member ) {
	if ( !isset( $gmw['search_results']['by_driving'] ) || $gmw['units_array'] == false )
		return;
	global $groups_template;
	_deprecated_function( 'gmw_gl_driving_distance', '2.5', 'gmw_driving_distance' );
	gmw_driving_distance( $groups_template->group, $gmw, false);
}

/**
 * GMW deprecated function - Per page dropdown
 * @version 1.0
 * @author Eyal Fitoussi
 */
function gmw_gl_per_page_dropdown( $gmw, $class ) {
	_deprecated_function( 'gmw_gl_per_page_dropdown', '2.5', 'gmw_per_page' );
	global $groups_template;
	gmw_per_page( $gmw, $groups_template->total_group_count, 'grpage' );
}

function gmw_gl_group_number( $gmw ) {
	global $groups_template;
	_deprecated_function( 'gmw_gl_group_number', '2.5', '$groups_template->group->group_count' );
	return $groups_template->group->group_count;
}

/**
 * premium settings
 */
/**
 * Deprecated - for older versions
 */
function gmw_ps_pt_excerpt( $info, $gmw, $count ) {
	_deprecated_function( 'gmw_ps_pt_excerpt', '1.5', 'gmw_get_excerpt' );
	echo gmw_get_excerpt( $info, $gmw, $info->post_content, $count );
}

/**
 * Deprecated - for older versions
 */
function gmw_ps_pt_get_address( $post, $gmw ) {
	_deprecated_function( 'gmw_ps_pt_get_address', '1.5', 'gmw_get_location_address' );
	echo gmw_get_location_address( $post, $gmw );
}

/**
 * Deprecated  - for older versions
 */
function gmw_ps_pt_distance( $post, $gmw ) {
	_deprecated_function( 'gmw_ps_pt_distance', '1.5', 'gmw_distance_to_location' );
	gmw_distance_to_location( $post, $gmw );
}

/**
 * Deprecated  - for older versions
 */
function gmw_ps_pt_additional_info( $post, $gmw ) {
	_deprecated_function( 'gmw_ps_pt_additional_info', '1.5', 'gmw_additional_info' );
	gmw_additional_info( $post, $gmw, $gmw['info_window']['additional_info'], $gmw['labels']['info_window'], 'ul' );
}

/**
 * Deprecated - for older versions
 */
function gmw_ps_pt_get_directions( $post, $gmw, $title ) {
	_deprecated_function( 'gmw_ps_pt_get_directions', '1.5', 'gmw_get_directions_link' );
	echo gmw_get_directions_link(  $post, $gmw, $title );
}

/**
 * Deprecated - for older versions
 */
function gmw_ps_fl_iw_member_address( $member, $gmw ) {
	_deprecated_function( 'gmw_ps_fl_iw_member_address', '1.5', 'gmw_get_location_address' );
	echo gmw_get_location_address( $member, $gmw );
}

/**
 * Deprecated - for older versions
 */
function gmw_ps_fl_distance( $member, $gmw ) {
	_deprecated_function( 'gmw_ps_fl_distance', '1.5', 'gmw_distance_to_location' );
	gmw_distance_to_location( $member, $gmw );
}

/**
 * Deprecated - for older versions
 */
function gmw_ps_fl_get_directions( $member, $gmw, $title ) {
	_deprecated_function( 'gmw_ps_fl_get_directions', '1.5', 'gmw_get_directions_link' );
	echo gmw_get_directions_link(  $member, $gmw, $title );
}

/**
 * Global Maps
 *
 */
/**
 * Deprecated - for older versions
 */
function gmpt_excerpt( $info, $gmw, $count ) {
	_deprecated_function( 'gmpt_excerpt', '2.5', 'gmw_get_excerpt' );
	echo gmw_get_excerpt( $info, $gmw, $info->post_content, $count );
}

/**
 * Deprecated - for older versions
 */
function gmpt_address( $post, $gmw ) {
	_deprecated_function( 'gmpt_address', '2.5', 'gmw_get_location_address' );
	echo gmw_get_location_address( $post, $gmw );
}

/**
 * Deprecated  - for older versions
 */
function gmpt_distance( $post, $gmw ) {
	_deprecated_function( 'gmpt_distance', '2.5', 'gmw_distance_to_location' );
	gmw_distance_to_location( $post, $gmw );
}

/**
 * Deprecated  - for older versions
 */
function gmpt_additional_info( $post, $gmw ) {
	_deprecated_function( 'gmpt_additional_info', '2.5', 'gmw_additional_info' );
	gmw_additional_info( $post, $gmw, $gmw['info_window']['additional_info'], 'info_window', 'div' );
}

/**
 * Deprecated - for older versions
 */
function gmpt_get_directions( $post, $gmw, $title ) {
	_deprecated_function( 'gmpt_get_directions', '2.5', 'gmw_get_directions_link' );
	echo gmw_get_directions_link(  $post, $gmw, $title );
}

/**
 * Deprecated - for older versions
 */
function gmfl_distance( $member, $gmw ) {
	_deprecated_function( 'gmfl_distance', '2.5', 'gmw_distance_to_location' );
	gmw_distance_to_location( $member, $gmw );
}

/**
 * Deprecated - for older versions
 */
function gmfl_get_directions( $member, $gmw, $title ) {
	_deprecated_function( 'gmfl_get_directions', '2.5', 'gmw_get_directions_link' );
	echo gmw_get_directions_link( $member, $gmw, $title );
}

/**
 * Deprecated - for older versions
 */
function gmw_ps_pt_read_more_link( $post, $label, $class ) {
	_deprecated_function( 'gmw_ps_pt_read_more_link', '2.5', 'gmw_get_excerpt' );
	return;
}


/**
 * Deprecated current location functions
 *
 * Use the Current Location add-on
 */
if ( ! GMW_Helper::is_addon_active( 'current_location' ) ) {

	/**
	 * Deprecated - User's current location class
	 *
	 * @version 1.0
	 * @author Eyal Fitoussi
	 */
	class GMW_Current_location {

		/**
		 * __constructor
		 */
		public function __construct() {

			add_shortcode( 'gmw_current_location', array($this, 'current_location' ) );
			add_action( 'wp_enqueue_scripts', 	   array($this, 'register_scripts_frontend' ) );

			if ( !has_action( 'wp_footer', array( $this, 'cl_template' ) ) ) {
				add_action( 'wp_footer', array( $this, 'cl_template' ) );
			}
			add_action( 'init', array( $this, 'submitted_location' ) );

		}

		/**
		 * Register scripts
		 */
		public function register_scripts_frontend() {
			wp_register_script( 'gmw-cl-js', GMW_URL . '/assets/js/gmw-cl.min.js', array('jquery'), GMW_VERSION, true );
		}

		/**
		 * Get current location
		 * @param $args
		 */
		public function current_location( $org_args ) {

			$args = shortcode_atts( array(
					'scid'		 			=> rand( 1,100 ),
					'title'      			=> 'Your location',
					'display_by' 			=> 'city,country',
					'text_only'	 			=> 0,
					'show_name'  			=> 1,
					'user_message' 			=> 'Hello',
					'guest_message' 		=> 'Hello, guest!',
					'map'		 			=> 1,
					'map_height' 			=> '200px',
					'map_width'  			=> '200px',
					'map_type'				=> 'ROADMAP',
					'zoom_level' 			=> 12,
					'scrollwheel'			=> 1,
					'map_marker'			=> 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png',
					'get_location_message' 	=> 'Get your current location'
					 
			), $org_args );
			 
			extract($args);

			if ( empty( $map_marker ) ) $map_marker = 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png';
			$userAddress  = false;
			$current_user = false;
			$location  	  = false;
			$location 	 .= '';
			$location 	 .= '<div id="gmw-cl-wrapper-'.$scid.'" class="gmw-cl-wrapper">';

			if ( $show_name == 1 ) {
				 
				if ( is_user_logged_in() ) {
					global $current_user;
					get_currentuserinfo();
					$hMessage = $user_message.' '.$current_user->user_login.'!';
				} else {
					$hMessage = $guest_message;
				}
				 
				$location .= '<div class="gmw-cl-welcome-message">'.$hMessage.'</div>';
			}
			 
			if ( !empty( $_COOKIE['gmw_ul_lat'] ) && !empty( $_COOKIE['gmw_ul_lng'] ) ) {
				 
				$userAddress   = array();
				 
				foreach ( explode( ',', $display_by ) as $field ) {
					if ( isset( $_COOKIE['gmw_ul_' . $field] ) ) {
						$userAddress[] = urldecode($_COOKIE['gmw_ul_' . $field]);
					}
				}
				 
				$location .= '<div class="gmw-cl-location-title-wrapper">';
				if ( isset( $title ) && !empty( $title ) ) {
					$location .= '<span class="gmw-cl-title">'.$title.'</span>';
				}
				 
				$location .= '<span class="gmw-cl-location"><a href="#" class="gmw-cl-form-trigger" title="' . __( 'Your Current Location', 'GMW' ) . '">'.implode(' ', $userAddress) . '</a></span>';
				$location .= '</div>';

				if ( $map == 1 ) {
					 
					$latitude  = urldecode( $_COOKIE['gmw_ul_lat'] );
					$longitude = urldecode( $_COOKIE['gmw_ul_lng'] );
					 
					$location .= '';
					$location .= '<div class="gmw-cl-map-wrapper" style="width:'.$map_width.'; height:'.$map_height.'">';
					$location .= 	'<div id="gmw-cl-map-'.$scid.'" class="gmw-cl-map-wrapper gmw-map" style="width:100%; height:100%;"></div>';
					$location .= '</div>';
				}
			} else {
				//disable map since we dont have location
				$map = false;

				$location .= '<span class="gmw-cl-title"><a href="#" class="gmw-cl-form-trigger" title="'.$get_location_message.'">';
				$location .= $get_location_message;
				$location .= '</a></span>';
			}
			?>
	        <script>
	            jQuery(document).ready(function($) {
	                if ( '<?php echo $map; ?>' == 1 ) {
	                	var userLoc  = new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>);
	                    var gmwClMap = new google.maps.Map(document.getElementById('gmw-cl-map-<?php echo $scid; ?>'), {
	                        zoom: parseInt(<?php echo $zoom_level; ?>),
	                        center: userLoc,
	                        mapTypeId: google.maps.MapTypeId['<?php echo $map_type; ?>'],
	                        scrollwheel:'<?php echo $scrollwheel; ?>',
	                        mapTypeControlOptions: {
	                            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
	                        }
	                    });
	     					
	                    gmwClMarker = new google.maps.Marker({
	                        position: userLoc,
	                        map: gmwClMap,
	                        icon:'<?php echo $map_marker; ?>'
	                    });            
	                };
	            });
	        </script>
	        <?php 
	    	//if only text we need
	    	if ( $text_only == 1 ) {		
	    		if ( !empty( $userAddress ) ) {
	    			return apply_filters( 'gmw_cl_display_text_only', '<span class="gmw-cl-location">'.implode(' ', $userAddress).'</span>', $userAddress, $current_user );
	    		} else {
	    			return false;
	    		}
	    	}
	    	
	    	if ( !wp_script_is( 'gmw-cl-js', 'enqueue' ) ) {
	    		wp_enqueue_script( 'gmw-cl-js' );
	    	}
			//wp_localize_script( 'gmw-cl-js', 'gmwSettings', get_option( 'gmw_options' ) );
	    	$location .= '</div>';

	    	trigger_error( 'GMW_Current_Location class which responsible for [gmw_current_location] is deprecated. PLease activate the "Current Location" add-on to use the latest [gmw_current_location] shortcode available for GEO my WP.' , E_USER_NOTICE );

	    	return apply_filters( 'gmw_cl_display_widget', $location, $userAddress, $display_by, $title, $show_name );

	    }

	    public function hidden_form() {

	        $form = '<div id="gmw-cl-hidden-form-wrapper">
	                    <form id="gmw-cl-hidden-form" method="post">
	                        <input type="hidden" id="gmw-cl-street" 		   name="gmw_cl_location[street]" value="" />
	                        <input type="hidden" id="gmw-cl-city"   		   name="gmw_cl_location[city]" value="" />
	                        <input type="hidden" id="gmw-cl-state" 			   name="gmw_cl_location[state]" value="" />
	                        <input type="hidden" id="gmw-cl-state-long" 	   name="gmw_cl_location[state_long]" value="" />
	                        <input type="hidden" id="gmw-cl-zipcode" 		   name="gmw_cl_location[zipcode]" value="" />
	                        <input type="hidden" id="gmw-cl-country" 		   name="gmw_cl_location[country]" value="" />
	                        <input type="hidden" id="gmw-cl-country-long" 	   name="gmw_cl_location[country_long]" value="" />
	                        <input type="hidden" id="gmw-cl-org-address" 	   name="gmw_cl_location[address]" value="" />
	                        <input type="hidden" id="gmw-cl-formatted-address" name="gmw_cl_location[formatted_address]" value="" />
	                        <input type="hidden" id="gmw-cl-lat" 			   name="gmw_cl_location[lat]" value="" />
	                        <input type="hidden" id="gmw-cl-lng" 			   name="gmw_cl_location[lng]" value="" />
	                        <input type="hidden" id="gmw-cl-action" 		   name="gmw_cl_action" value="post" />
	                    </form>
	                </div>';

	        return $form;

	    }

	    /**
	     * Current location form
	     */
	    public function cl_template() {

	    	$template  = '';
	    	$template .= '<div id="gmw-cl-form-wrapper" class="gmw-cl-form-wrapper" style="display:none;">';
	    	$template .= 	'<span id="gmw-cl-close-btn">X</span>';
	    	$template .= 	'<form id="gmw-cl-form" name="gmw_cl_form" onsubmit="return false">';
	    	$template .= 		'<div id="gmw-cl-info-wrapper">';
	    	$template .= 			'<div id="gmw-cl-location-message">' . __('- Enter Your Location -', 'GMW') . '</div>';
	    	$template .= 			'<div id="gmw-cl-input-fields"><input type="text" name="gmw-cl_address" id="gmw-cl-address" value="" placeholder="zipcode or full address..." /><input id="gmw-cl-submit-address" type="submit" value="go" /></div>';
	    	$template .= 			'<div> - or - </div>';
	    	$template .= 			'<div id="gmw-cl-get-location"><a href="#" id="gmw-cl-trigger" >';
	    	$template .= 				__('Get your current location', 'GMW');
	    	$template .= 			'</a></div>';
	    	$template .= 		'</div>';
	    	$template .=		'<div id="gmw-cl-respond-wrapper" style="display:none;">';
	    	$template .= 			'<div id="gmw-cl-spinner"><img src="'.GMW_IMAGES.'/gmw-loader.gif" /></div>';
	    	$template .= 			'<div id="gmw-cl-message"></div>';
	    	$template .= 			'<div id="gmw-cl-map" style="width:100%;height:100px;display:none;"></div>';
	    	$template .=		'</div>';
	    	$template .= 	'</form>';
	    	$template .= '</div>';
	    	 
	    	$template = apply_filters( 'gmw_current_location_form', $template );

	    	$template .= $this->hidden_form();

	    	echo $template;
	    }

	    /**
	     * Submit user current location
	     * @param unknown_type $location
	     */
	    public function submitted_location( $location ) {

	        if ( empty( $_POST['gmw_cl_action'] ) )
	        	return;

	        //do something with the information
	        do_action( 'gmw_user_current_location_submitted', $_POST['gmw_cl_location'], get_current_user_id() );	
	        
	        //reload page to prevent form resubmission
	        wp_redirect( $_SERVER['REQUEST_URI'] );
	        exit;
	    }
	}

	//new GMW_Current_Location;
	
	/**
	 * GMW Widget - User's current location
	 * @version 1.0
	 * @author Eyal Fitoussi
	 */
	class GMW_Current_Location_Widget extends WP_Widget {

		/**
		 * __constructor
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
					'gmw_current_location_widget', // Base ID
					__('GMW Current Location', 'GMW'), // Name
					array('description' => __('Get/display the user\'s current location', 'GMW'),) // Args
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

			extract($args);

			$widget_title   	  = $instance['widget_title']; // the widget title
			$title_location 	  = $instance['title_location'];
			$display_by     	  = ( !empty( $display_by ) ) ? implode(',', $display_by) : 'city';
			$name_guest     	  = $instance['name_guest'];
			$title_location 	  = $instance['title_location'];
			$text_only			  = $instance['text_only'];
			$map				  = $instance['map'];
			$map_height			  = $instance['map_height'];
			$map_width  		  = $instance['map_width'];
			$map_type			  = $instance['map_type'];
			$zoom_level 		  = $instance['zoom_level'];
			$scrollwheel		  = $instance['scrollwheel'];
			$map_marker			  = ( !empty( $instance['map_marker'] ) ) ? $instance['map_marker'] : 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png';
			$user_message		  = $instance['user_message'];
			$guest_message		  = $instance['guest_message'];
			$get_location_message = $instance['get_location_message'];

			echo $before_widget;

			if ( isset( $widget_title ) && !empty( $widget_title ) )
				echo $before_title . $widget_title . $after_title;

			echo do_shortcode('[gmw_current_location
					display_by="'.$display_by.'"
					show_name="'.$name_guest.'"
					title_location="'.$title_location.'"
					text_only="'.$text_only.'"
					map="'.$map.'"
					map_height="'.$map_height.'"
					map_width="'.$map_width.'"
					map_type="'.$map_type.'"
					zoom_level='.$zoom_level.'"
					scrollwheel="'.$scrollwheel.'"
					map_marker="'.$map_marker.'"
					]');

			echo '<div class="clear"></div>';

			echo $after_widget;
		}

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
		function update( $new_instance, $old_instance ) {
			 
			$instance['widget_title']         = strip_tags($new_instance['widget_title']);
			$instance['title_location']       = strip_tags($new_instance['title_location']);
			$instance['short_code_location']  = $new_instance['short_code_location'];
			$instance['display_by']           = $new_instance['display_by'];
			$instance['name_guest']           = $new_instance['name_guest'];
			$instance['text_only']            = $new_instance['text_only'];
			$instance['map']          		  = $new_instance['map'];
			$instance['map_width']         	  = $new_instance['map_width'];
			$instance['map_height']           = $new_instance['map_height'];
			$instance['map_type']         	  = $new_instance['map_type'];
			$instance['zoom_level']           = $new_instance['zoom_level'];
			$instance['scrollwheel']          = $new_instance['scrollwheel'];
			$instance['map_marker']           = $new_instance['map_marker'];
			$instance['user_message']         = $new_instance['user_message'];
			$instance['guest_message']        = $new_instance['guest_message'];
			$instance['get_location_message'] = $new_instance['get_location_message'];
			 
			return $instance;
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		function form( $instance ) {

			$defaults = array(
					'widget_title'   		=> __('Current Location', 'GMW'),
					'title_location' 		=> __('Your Location', 'GMW'),
					'display_by'     		=> 'city,country',
					'name_guest'     		=> 1,
					'user_message' 			=> 'Hello',
					'guest_message' 		=> 'Hello, guest!',
					'text_only'      		=> 0,
					'map'     		 		=> 0,
					'map_height'     		=> '200px',
					'map_width'      		=> '200px',
					'map_type'       		=> 'ROADMAP',
					'zoom_level'     		=> 12,
					'scrollwheel'    		=> 1,
					'map_marker'			=> 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png',
					'get_location_message' 	=> 'Get your current location'
			);

			$instance = wp_parse_args( (array ) $instance, $defaults );

			if ( !empty( $instance['display_by'] ) && !is_array( $instance['display_by'] ) ) {
				$instance['display_by'] = explode( ',', $instance['display_by'] );
			}

			trigger_error( 'GMW_Current_Location_Widget widget is deprecated. PLease activate the "Current Location" add-on to use the latest Current Location widget availabe for GEO my WP.' , E_USER_NOTICE );

			?>

	        <p>
	            <label><?php echo esc_attr( __( "Widget's Title", 'GMW' ) ); ?>:</label>     
	            <input type="text" name="<?php echo $this->get_field_name('widget_title'); ?>" value="<?php if ( isset( $instance['widget_title'] ) ) echo $instance['widget_title']; ?>" class="widefat" />
	        </p>
	        <p>
	            <label><?php echo esc_attr( __( 'Location Title', 'GMW' ) ); ?>:</label>
	            <input type="text" name="<?php echo $this->get_field_name('title_location'); ?>" value="<?php if (isset($instance['title_location'])) echo $instance['title_location']; ?>" class="widefat" />
	            <em style="font-size:12px;color:#777;display:block;margin:5px 0px;">
	            	<?php _e( "The title that will be displayed before the location. For example Your location...", 'GMW' ); ?>
	            </em>
	        </p>
	         <p>
	            <label><?php echo esc_attr(__( 'Display Location:' ) ); ?></label><br />
	            <em style="font-size:12px;color:#777;display:block;margin:5px 0px;">
	            	<?php _e( "The address fields to be displayed.", 'GMW' ); ?>
	            </em>
	            <input type="checkbox" value="street"  name="<?php echo $this->get_field_name('display_by'); ?>[]" <?php if (isset($instance['display_by']) && in_array('street', $instance['display_by'])) echo 'checked="checked"'; ?> class="checkbox" /><label><?php _e('Street', 'GMW'); ?></label><br />
	            <input type="checkbox" value="city"    name="<?php echo $this->get_field_name('display_by'); ?>[]" <?php if (isset($instance['display_by']) && in_array('city', $instance['display_by'])) echo 'checked="checked"'; ?> class="checkbox" /><label><?php _e('City', 'GMW'); ?></label><br />
	            <input type="checkbox" value="state"   name="<?php echo $this->get_field_name('display_by'); ?>[]" <?php if (isset($instance['display_by']) && in_array('state', $instance['display_by'])) echo 'checked="checked"'; ?> class="checkbox" /><label><?php _e('State', 'GMW'); ?></label><br />
	            <input type="checkbox" value="zipcode" name="<?php echo $this->get_field_name('display_by'); ?>[]" <?php if (isset($instance['display_by']) && in_array('zipcode', $instance['display_by'])) echo 'checked="checked"'; ?> class="checkbox" /><label><?php _e('Zipcode', 'GMW'); ?></label><br />
	            <input type="checkbox" value="country" name="<?php echo $this->get_field_name('display_by'); ?>[]" <?php if (isset($instance['display_by']) && in_array('country', $instance['display_by'])) echo 'checked="checked"'; ?> class="checkbox" /><label><?php _e('Country', 'GMW'); ?></label><br />
	        </p>
	        <p>
	        	<input type="checkbox" value="1" name="<?php echo $this->get_field_name('name_guest'); ?>" <?php if ( isset( $instance["name_guest"] ) ) echo 'checked="checked"'; ?> class="checkbox" />
	            <label><?php echo esc_attr( __( 'Display guest/User Name', 'GMW' ) ); ?></label>
	            <em style="font-size:12px;color:#777;display:block;margin:5px 0px;">
	            	<?php _e( "Display greeting with \"guest\" or user name before the location.", 'GMW' ); ?>
	            </em>
	        </p>      
	         <p>
	            <label><?php echo esc_attr( __( 'Greeting message ( logged in users )', 'GMW' ) ); ?>:</label>
	            <input type="text" name="<?php echo $this->get_field_name('user_message'); ?>" value="<?php if ( isset($instance['user_message'] ) ) echo $instance['user_message']; ?>" class="widefat" />
	            <em style="font-size:12px;color:#777;display:block;margin:5px 0px;">
	            	<?php _e( "Text that will be displayed before the user name. For example \"Hello username\" ( requires the Display guest/User Name chekbox to be checked ).", 'GMW' ); ?>
	            </em>           
	        </p>    
	        <p>
	            <label><?php echo esc_attr( __( 'Greeting message ( guests )', 'GMW' ) ); ?>:</label>
	            <input type="text" name="<?php echo $this->get_field_name('guest_message'); ?>" value="<?php if ( isset( $instance['guest_message'])) echo $instance['guest_message']; ?>" class="widefat" />
	            <em style="font-size:12px;color:#777;display:block;margin:5px 0px;">
	            	<?php _e( "Text that will be displayed when user is not looged in. for example \"Hello Guest\" ( requires the Display guest/User Name chekbox to be checked ).", 'GMW' ); ?>
	            </em>
	        </p>          
	        <p>
	        	<input type="checkbox" value="1" name="<?php echo $this->get_field_name('map'); ?>" <?php if ( isset( $instance["map"] ) ) echo 'checked="checked"'; ?> class="checkbox" />
	            <label><?php echo esc_attr( __( 'Display Google Map', 'GMW' ) ); ?></label>
	            <em style="font-size:12px;color:#777;display:block;margin:5px 0px;">
	            	<?php _e( "Display Google map showing the user's location.", 'GMW' ); ?>
	            </em>
	        </p>       
	        <p>
	            <label><?php echo esc_attr( __( 'Map Height', 'GMW') ); ?>:</label>
	            <input type="text" name="<?php echo $this->get_field_name( 'map_height' ); ?>" value="<?php if ( isset( $instance['map_height'] ) ) echo $instance['map_height']; ?>" class="widefat" />
	            <em style="font-size:12px;color:#777;display:block;margin:5px 0px;">
	            	<?php _e( "Set the map height in pixels or percentage ( ex. 250px ).", 'GMW' ); ?>
	            </em>
	        </p>
	        <p>
	            <label><?php echo esc_attr( __( 'Map Width', 'GMW') ); ?>:</label>
	            <input type="text" name="<?php echo $this->get_field_name( 'map_width' ); ?>" value="<?php if ( isset( $instance['map_width'] ) ) echo $instance['map_width']; ?>" class="widefat" />
	            <em style="font-size:12px;color:#777;display:block;margin:5px 0px;">
	            	<?php _e( "Set the map width in pixels or percentage ( ex. 100% ).", 'GMW' ); ?>
	            </em>
	        </p> 
	        <p>
	            <label><?php echo esc_attr( __( 'Map Marker', 'GMW') ); ?>:</label>
	            <input type="text" name="<?php echo $this->get_field_name( 'map_marker' ); ?>" value="<?php echo ( !empty( $instance['map_marker'] ) ) ? $instance['map_marker'] : 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png'; ?>" class="widefat" />
	        	<em style="font-size:12px;color:#777;display:block;margin:5px 0px;">
	            	<?php _e( "Link to the image that will be used as the map marker.", 'GMW' ); ?>
	            </em>  
	        </p>       
	        <p>
	            <label><?php echo _e( 'Map Type', 'GMW'); ?>:</label>
	            <select name="<?php echo $this->get_field_name( 'map_type' ); ?>">
	        		<option value="ROADMAP"   <?php if ( isset( $instance['map_type'] ) && $instance['map_type'] == "ROADMAP" ) echo 'selected="selected"'; ?>>ROADMAP</options>
	        		<option value="SATELLITE" <?php if ( isset( $instance['map_type'] ) && $instance['map_type'] == "SATELLITE" ) echo 'selected="selected"'; ?> >SATELLITE</options>
	        		<option value="HYBRID"    <?php if ( isset( $instance['map_type'] ) && $instance['map_type'] == "HYBRID" ) echo 'selected="selected"'; ?>>HYBRID</options>
	        		<option value="TERRAIN"   <?php if ( isset( $instance['map_type'] ) && $instance['map_type'] == "TERRAIN" ) echo 'selected="selected"'; ?>>TERRAIN</options>
	            </select>
	        </p>       
	         <p>
	            <label><?php echo _e( 'Zoom Level', 'GMW' ); ?>:</label>
	            <select name="<?php echo $this->get_field_name('zoom_level'); ?>">
	        	<?php for ($i = 1; $i < 18; $i++): ?>
	            	<option value="<?php echo $i; ?> " <?php if (isset($instance['zoom_level']) && $instance['zoom_level'] == $i) echo "selected"; ?>><?php echo $i; ?></option>
	        	<?php endfor; ?> 
	            </select>
	        </p>
	        <p>
	        	<input type="checkbox" value="1" name="<?php echo $this->get_field_name('scrollwheel'); ?>" <?php if ( isset( $instance["scrollwheel"] ) ) echo 'checked="checked"'; ?> class="checkbox" />
	            <label><?php echo esc_attr( __( 'ScrollWheel Enabled', 'GMW' ) ); ?></label>       
	        	<em style="font-size:12px;color:#777;display:block;margin:5px 0px;">
	            	<?php _e( "When enabled the map will zoom in/out using the mouse scrollwheel.", 'GMW' ); ?>
	            </em> 
	        </p>
	        <?php
	    }
	}   
	//add_action( 'widgets_init', create_function( '', 'return register_widget( "GMW_Current_Location_Widget" );' ) );
}

/**
 * deprecated Single post and member location
 */
if ( ! GMW_Helper::is_addon_active( 'single_location' ) ) {

	/**
	 * GMW PT Shortcode - Shortcode display location of a single post, post type or a page.
	 * @version 1.0
	 * @author Eyal Fitoussi
	 */
	class GMW_Single_Post_Location {

	    /**
	     * __Constructor
	     */
	    function __construct() {
	        add_shortcode( 'gmw_single_location', array( $this, 'get_single_location' ) );
	    }

	    public function get_single_location( $args) {

	    	//default shortcode attributes
	    	extract(
	    			shortcode_atts(
	    					array(
	    							'element_id'	  => 0,
	    							'post_id'         => 0,
	    							'post_title'	  => 0,
	    							'distance'		  => 1,
	    							'distance_unit'	  => 'm',
	    							'map'             => 1,
	    							'map_height'      => '250px',
	    							'map_width'       => '250px',
	    							'map_type'        => 'ROADMAP',
	    							'zoom_level'      => 13,
	    							'additional_info' => 'address,phone,fax,email,website',
	    							'directions'      => 1,
	    							'info_window'	  => 1,
	    							'show_info'		  => 1,
	    							'ul_marker'   	  => 1,
	    							'ul_message'	  => __( 'Your Location', 'GMW' ),
	    					), $args )
	    	);

	    	$element_id = ( $element_id != 0 ) ? $element_id : rand( 5, 100 );

	    	/*
	    	 * check if user entered post id
	    	*/
	    	if ( $post_id == 0 ) {

	    		global $post;
	    		$post_id = $post->ID;

	        }

	        if ( $zoom_level == 'auto' ) {
	        	$zoom_level = 13;
	        }

	        //get the post's info
	        $post_info = gmw_get_post_location_from_db( $post_id );

	        //if post has no location stop the function
	        if ( ! $post_info ) {
	            return;
	        }

	        $location_wrap_start = '<div id="gmw-single-post-sc-' . $element_id . '-wrapper" class="gmw-single-post-sc-wrapper gmw-single-post-sc-wrapper-'.$post_id.'">';
	       
	        $location_title = '';
	        if ( $post_title == 1 ) {
	        	$location_title = '<h3>'. get_the_title($post_id) .'</h3>';
	        } 

	        $userLocationOk    = ( !empty( $_COOKIE['gmw_ul_lat'] ) && !empty( $_COOKIE['gmw_ul_lng'] ) ) ? true : false;
	        $distanceOK 	   = 0;
	        $yLat			   = 0;
	        $yLng			   = 0;
	        $location_distance = '';
	        
	        if ( $distance == 1 && $userLocationOk ) {
		        
	        	$distanceOK 	= 1;
	        	$yLat			= urldecode( $_COOKIE['gmw_ul_lat'] );
	        	$yLng			= urldecode( $_COOKIE['gmw_ul_lng'] );
	        	$unit  			= $distance_unit;
		        $theta 			= $yLng - $post_info->lng;
		        $distance_value = sin( deg2rad( $yLat  ) ) * sin( deg2rad($post_info->lat ) ) +  cos( deg2rad( $yLat ) ) * cos( deg2rad($post_info->lat) ) * cos( deg2rad( $theta ) );
		        $distance_value = acos($distance_value);
		        $distance_value = rad2deg($distance_value);
		        $miles 			= $distance_value * 60 * 1.1515;
		        
		        if ( $unit == "k" ) {
		        	$distance_value = ( $miles * 1.609344 );
		        	$units_name		= 'km';
		        } else {
		        	$distance_value = ($miles * 0.8684);
		        	$units_name		= 'mi';
		        } 

		        $location_distance = '<div class="distance-wrapper"><p>'.__( 'Distance:','GMW' ). ' '. round( $distance_value, 2 ) .' '.$units_name.'</p></div>';
	        }
	        
	        $location_map = '';
	        if ( $map == 1 ) {			
	        	$location_map  = '';
	            $location_map .= '<div class="map-wrapper" style="width:' . $map_width . '; height:' . $map_height . '">';
	            $location_map .= 	'<div id="gmw-single-post-map-' . $element_id . '" class="gmw-map" style="width:100%; height:100%;"></div>';
	            $location_map .= '</div>';
	        }
			
	        $location_directions = '';
	        if ( $directions == 1 ) {
				
	        	$your_address = '';
	        	if ( !empty( $_GET['address'] ) ) {
	        		$your_address = sanitize_text_field( $_GET['address'] );
	        	} elseif ( !empty( $_COOKIE['gmw_ul_address'] ) ) {
	        		$your_address = urldecode( $_COOKIE['gmw_ul_address'] );
	        	}
	        		
	        	$location_directions  = '';
	            $location_directions .= '<div class="directions-wrapper">';
	            $location_directions .= 	'<div id="gmw-single-post-sc-form-' . $element_id . '" class="gmw-single-post-sc-form" style="display:none;">';
	            $location_directions .= 		'<form action="https://maps.google.com/maps" method="get" target="_blank">';
	            $location_directions .= 			'<input type="text" size="35" name="saddr" value="'. esc_attr( $your_address ).'" placeholder="Your location" />';
	            $location_directions .= 			'<input type="hidden" name="daddr" value="' . esc_attr( $post_info->address ) . '" />';
	            $location_directions .= 			'<input type="submit" class="button" value="' . __( 'GO', 'GMW' ) . '" />';
	            $location_directions .= 		'</form>';
	            $location_directions .= 	'</div>';
	            $location_directions .= 	'<a href="#" id="single-post-trigger-' . $element_id . '"  class="single-post-trigger">' . __( 'Get Directions', 'GMW' ) . '</a>';
	            $location_directions .= '</div>';
	    	}
			
	    	$additional_info_ok = false;
	    	$location_info = '';
	        //if we are showing additional information
	        if ( isset( $additional_info ) || $additional_info != 0 ) {
	        	
	        	$additional_info_ok = true;
	            $additional_info    = explode( ',', $additional_info );
				
	            $location_info  = '';
	            $location_info .= '<div class="gmw-single-post-sc-additional-info">';

	            $post_address = ( !empty( $post_info->formatted_address ) ) ? esc_attr( $post_info->formatted_address ) : esc_attr( $post->address );
	            
	            if ( in_array( 'address', $additional_info ) && !empty( $post_address ) ) {
	                $location_info .= '<div class="gmw-address"><span>' . __( 'Address: ', 'GMW' );
	                $location_info .= '</span>';
	                $location_info .= ( !empty( $post_info->formatted_address ) ) ? esc_attr( $post_info->formatted_address ) : __( 'N/A', 'GMW' );
	                $location_info .= '</div>';
	            }
	            if ( in_array( 'phone', $additional_info ) && !empty( $post_info->phone ) ) {
	                $location_info .= '<div class="gmw-phone"><span>' . __( 'Phone: ', 'GMW' );
	                $location_info .= '</span>';
	                $location_info .= ( !empty( $post_info->phone ) ) ? esc_attr( $post_info->phone ) : __( 'N/A', 'GMW' );
	                $location_info .= '</div>';
	            }
	            if ( in_array( 'fax', $additional_info ) && !empty( $post_info->fax ) ) {
	                $location_info .= '<div class="gmw-fax"><span>' . __( 'Fax: ', 'GMW' );
	                $location_info .= '</span>';
	                $location_info .= ( !empty( $post_info->fax ) ) ? esc_attr( $post_info->fax ) : __( 'N/A', 'GMW' );
	                $location_info .= '</div>';
	            }
	            if ( in_array( 'email', $additional_info ) && !empty( $post_info->email ) ) {
	                $location_info .= '<div class="gmw-email"><span>' . __( 'Email: ', 'GMW' );
	                $location_info .= '</span>';
	                $location_info .= ( !empty( $post_info->email ) ) ? '<a href="mailto:' . esc_attr( $post_info->email ) . ' ">' . esc_attr( $post_info->email ) . '</a>' : __( 'N/A', 'GMW' );
	                $location_info .= '</div>';
	            }
	            if ( in_array( 'website', $additional_info ) && !empty( $post_info->website ) ) {
	                $location_info .= '<div class="gmw-website"><span>' . __( 'Website: ', 'GMW' );
	                $location_info .= '</span>';
	                $location_info .= ( !empty( $post_info->website ) ) ? '<a href="http://' . esc_attr( $post_info->website ) . '" target="_blank">' . esc_attr( $post_info->website ) . '</a>' : "N/A";
	                $location_info .= '</div>';
	            }
	            $location_info .= '</div>';
	        }
	        $location_wrap_end = '</div>';     	
	        ?>
	        <script>

	            jQuery(document).ready(function($) {

	                $('#single-post-trigger-<?php echo $element_id; ?>').click(function(event) {
	                    event.preventDefault();
	                    $('#gmw-single-post-sc-form-<?php echo $element_id; ?>').slideToggle();
	                });

	                if ( '<?php echo $map; ?>' == 1 ) {

	                    var gmwSinglePostMap = new google.maps.Map(document.getElementById('gmw-single-post-map-<?php echo $element_id; ?>'), {
	                        zoom: parseInt(<?php echo $zoom_level; ?>),
	                        center: new google.maps.LatLng(<?php echo $post_info->lat; ?>, <?php echo $post_info->lng; ?>),
	                        mapTypeId: google.maps.MapTypeId['<?php echo $map_type; ?>'],
	                        mapTypeControlOptions: {
	                            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
	                        }
	                    });

	                    var latlngbounds = new google.maps.LatLngBounds();
	                    var desLoc = new google.maps.LatLng(<?php echo $post_info->lat; ?>, <?php echo $post_info->lng; ?>);
	                    latlngbounds.extend(desLoc);
	                    
	                    gmwSinglePostMarker = new google.maps.Marker({
	                        position: desLoc,
	                        map: gmwSinglePostMap,
	                        icon:'https://maps.google.com/mapfiles/ms/icons/red-dot.png'
	                    });
				           
	                    if ( '<?php echo $info_window; ?>' == 1 ) {
	                        
		                    var infowindow = new google.maps.InfoWindow();
		
							var infoWindoContent = '';
							infoWindoContent += '<div class="gmw-info-window wppl-info-window" style="font-size: 13px;color: #555;line-height: 18px;font-family: arial;">';
							if ( '<?php echo $post_title ;?>' ==  1 ) {
								infoWindoContent += '<div class="map-info-title" style="color: #457085;text-transform: capitalize;font-size: 16px;margin-bottom: -10px;"><?php echo $post_title; ?></div><br />'
							}
							if ( '<?php echo $distance; ?>' == 1 ) {
								infoWindoContent += '<?php echo $location_distance; ?>';
							}
							if ( '<?php echo $additional_info_ok; ?>' == true ) {
								infoWindoContent += '<?php echo $location_info; ?>';
							}
							infoWindoContent += '</div>';
		
							google.maps.event.addListener(gmwSinglePostMarker, 'click', function() {
		                        infowindow.setContent(infoWindoContent);
		                        infowindow.open(gmwSinglePostMap, gmwSinglePostMarker);
		                    });
						}
	                    
	                    if ( '<?php echo $userLocationOk; ?>' == true && '<?php echo $ul_marker; ?>' == 1  ) {

	                        var yourLoc = new google.maps.LatLng(<?php echo $yLat; ?>, <?php echo $yLng; ?>);
	                    	latlngbounds.extend(yourLoc);
	                    	
		                    ylMarker = new google.maps.Marker({
		                        position: yourLoc,
		                        map: gmwSinglePostMap,
		                        icon:'https://maps.google.com/mapfiles/ms/icons/blue-dot.png'
		                    });

		                    gmwSinglePostMap.fitBounds(latlngbounds);

		                    if ( '<?php echo $ul_message; ?>' != 0 ) {
		                   		var yourInfoWindow = new google.maps.InfoWindow();
		                    	yourInfoWindow.setContent('<?php echo $ul_message; ?>');
		                    	yourInfoWindow.open(gmwSinglePostMap, ylMarker);
		                    }  
	                    }                 
	                };
	            });
	        </script>
	        <?php
	        
	        trigger_error( 'GMW_Single_Post_Location class which responsibles for the [gmw_single_location] shortcode is now deprecated. Please activate the Single Location add-on to use the new [gmw_single_location] shortcode properly.' , E_USER_NOTICE );

	        if ( $show_info == 1 ) {
	       		$output = $location_wrap_start.$location_title.$location_map.$location_distance.$location_info.$location_directions.$location_wrap_end;
	        }else {
	        	$output = $location_wrap_start.$location_map.$location_wrap_end;
	        }
	        
	        return apply_filters( 'gmw_pt_single_location_output', $output, $args, $location_wrap_start, $location_title, $location_map, $location_distance, $location_info, $location_directions, $location_wrap_end );
	    }
	}
	//new GMW_Single_Post_Location();

	/**
	 * GMW FL Shortcode - Display single member location
	 * @version 1.0
	 * @author Eyal Fitoussi
	 */
	function gmw_member_location($member) {

		/*
		 * extract the attributes
		*/
		extract( shortcode_atts(
				array(
						'user_id'        		=> false,
						'display_name'			=> 1,
						'directions'     		=> 1,
						'map_height'     		=> '250px',
						'map_width'      		=> '250px',
						'map_type'       		=> 'ROADMAP',
						'zoom_level'     		=> 13,
						'address'        		=> 1,
						'no_location'    		=> 0,
						'address_fields' 		=> 'formatted_address',
						'show_on_single_post'	=> 1,
				), $member));

		if ( $user_id == false && !bp_is_user() && ( !is_single() || $show_on_single_post != 1 ) )
			return;

		$scID = rand(1, 9999);

		if ( $user_id != false ) {
			$member_id = $user_id;
		} elseif ( bp_is_user() ) {
			global $bp;
			$member_id = $bp->displayed_user->id;
		} elseif ( is_single() ) {
			global $post;
			$member_id = $post->post_author;
		}

		$member_info = gmw_get_member_info_from_db($member_id);

		if ( isset( $member_info ) && $member_info != false ) {

			/*
			 * get the full address
			*/
			$address_fields = explode( ',', $address_fields );

			if ( !isset( $address_fields ) || empty( $address_fields ) || count( $address_fields ) == 5 ) {
				$address_array[] = $member_info->formatted_address;
			} else {
				$address_array = array();

				foreach ($address_fields as $field) {
					$address_array[] = $member_info->$field;
				}
			}

			$show_address = apply_filters('gmw_fl_single_member_location_address', implode(' ', $address_array), $member_info, $member );

			/*
			 * display the map and information
			*/
			$member_map = false;
			$member_map .='';
			$member_map .= '<div id="gmw-single-member-sc-wrapper-' . $scID . '" class="gmw-single-member-sc-wrapper gmw-single-member-sc-wrapper-' . $member_id . '">';

			if ( $display_name == 1 ) {
				$member_map .= '<h3 class="display-name">'.bp_core_get_userlink( $member_id ).'</h3>';
			}
			$member_map .= '<div class="map-wrapper" style="width:' . $map_width . '; height:' . $map_height . ';">';
			$member_map .= 		'<div id="gmw-single-member-sc-map-' . $scID . '" class="gmw-map" style="width:100%; height:100%"></div>';
			$member_map .= 		'<img class="gmw-map-loader" src="' . GMW_IMAGES . '/map-loader.gif" style="position:absolute;top:45%;left:25%;width:50%" />';
			$member_map .= '</div>'; // map wrapper //

			if ( isset( $address_fields ) && !empty( $address_fields ) && $address_fields != 0 ) {
				$member_map .= '<div class="address-wrapper"><span>' . __('Address: ', 'GMW') . '</span>' . $show_address . '</div>';
			}

			if ($directions == 1) {
				$member_map .= '<div  class="direction-wrapper">';
				$member_map .= 		'<div id="single-member-form-wrapper-' . $scID . '" class="single-member-form-wrapper" style="display:none;">';
				$member_map .= 			'<form action="https://maps.google.com/maps" method="get" target="_blank">';
				$member_map .= 				'<input type="text" name="saddr" />';
				$member_map .= 				'<input type="hidden" name="daddr" value="' . $show_address . '" /><br />';
				$member_map .= 				'<input type="submit" class="button" value="' . __('Go', 'GMW') . '" />';
				$member_map .= 			'</form>';
				$member_map .= 		'</div>';
				$member_map .= 		'<span><a href="#" class="single-member-toggle" id="single-member-toggle-' . $scID . '">' . __('Get Directions', 'GMW') . '</a></span>';
				$member_map .= '</div>';
			}

			$member_map .= '</div>'; // map wrapper //
			?>
	        <script>
	            jQuery(document).ready(function($) {

	                $(function() {
	                    $('#single-member-toggle-' +<?php echo $scID; ?>).click(function(event) {
	                        event.preventDefault();
	                        $('#single-member-form-wrapper-' +<?php echo $scID; ?>).slideToggle();
	                    });
	                });

	                geocoder = new google.maps.Geocoder();
	                geocoder.geocode({'address': '<?php echo $show_address; ?>'}, function(results, status) {
	                    if (status == google.maps.GeocoderStatus.OK) {
	                        var mapSingle = new google.maps.Map(document.getElementById('gmw-single-member-sc-map-' + <?php echo $scID; ?>), {
	                            zoom: parseInt(<?php echo $zoom_level; ?>),
	                            center: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
	                            mapTypeId: google.maps.MapTypeId['<?php echo $map_type; ?>'],
	                        });

	                        marker = new google.maps.Marker({
	                            position: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
	                            map: mapSingle,
	                            shadow: 'https://chart.googleapis.com/chart?chst=d_map_pin_shadow'
	                        });
	                    }
	                });
	            });
	        </script>
	        <?php
	        return apply_filters( 'gmw_fl_single_member_location', $member_map, $member_info );
	    } elseif ( isset( $no_location ) ) {
	        return apply_filters('gmw_fl_no_location_message', bp_core_get_user_displayname($member_id) . __(' has not added a location yet', 'GMW'), $member_id);
	    }
	}
	//add_shortcode( 'gmw_member_location', 'gmw_member_location' );
}