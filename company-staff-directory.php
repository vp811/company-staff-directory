<?php
/*
Plugin Name: Company Staff Directory
Plugin URI: http://eavasquez.com/company-directory
Description: Creates a custom post type for a staff directory
Version: 1.0.0
Author: Efren Vasquez
Author URI: http://eavasquez.com
License: GPL2
*/

/*============================================


Custom Plugin Stylesheet


===============================================*/
function companyTeamMemberStyling(){
  wp_enqueue_style('company-team-members-style', plugin_dir_url(__FILE__) . 'public/css/styles.css');
}

add_action('wp_enqueue_scripts', 'companyTeamMemberStyling' );

/*============================================


Register Custom Post type Team Members


===============================================*/
function company_register_team_members() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'company-team-members' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'company-team-members' ),
		'menu_name'             => __( 'Team Members', 'company-team-members' ),
		'name_admin_bar'        => __( 'Team Members', 'company-team-members' ),
		'archives'              => __( 'Team Member Archives', 'company-team-members' ),
		'attributes'            => __( 'Team Member Attributes', 'company-team-members' ),
		'parent_item_colon'     => __( 'Parent Team Member', 'company-team-members' ),
		'all_items'             => __( 'All Team Members', 'company-team-members' ),
		'add_new_item'          => __( 'Add New Team Member', 'company-team-members' ),
		'add_new'               => __( 'Add New Team Member', 'company-team-members' ),
		'new_item'              => __( 'New Team Member', 'company-team-members' ),
		'edit_item'             => __( 'Edit Team Member', 'company-team-members' ),
		'update_item'           => __( 'Update Team Member', 'company-team-members' ),
		'view_item'             => __( 'View Team Member', 'company-team-members' ),
		'view_items'            => __( 'View Team Members', 'company-team-members' ),
		'search_items'          => __( 'Search Team Members', 'company-team-members' ),
		'not_found'             => __( 'Team Members not found', 'company-team-members' ),
		'not_found_in_trash'    => __( 'Team Member Not found in Trash', 'company-team-members' ),
		'featured_image'        => __( 'Team Member Image', 'company-team-members' ),
		'set_featured_image'    => __( 'Set Team Member Image', 'company-team-members' ),
		'remove_featured_image' => __( 'Remove Team Member Image', 'company-team-members' ),
		'use_featured_image'    => __( 'Use as Team Member Image', 'company-team-members' ),
		'insert_into_item'      => __( 'Insert into Team Member', 'company-team-members' ),
		'uploaded_to_this_item' => __( 'Uploaded to Team Member', 'company-team-members' ),
		'items_list'            => __( 'Items list', 'company-team-members' ),
		'items_list_navigation' => __( 'Team Member list navigation', 'company-team-members' ),
		'filter_items_list'     => __( 'Filter Team Members', 'company-team-members' ),
	);

  $rewrite = array(
    'slug'                 => 'people'
  );

	$args = array(
		'label'                 => __( 'Team Member', 'company-team-members' ),
		'description'           => __( 'Company\'s Team Members', 'company-team-members' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'revisions', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'people',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
    'rewrite'               => $rewrite
	);
	register_post_type( 'company-team-members', $args );

}
add_action( 'init', 'company_register_team_members', 0 );


/*============================================


Register Custom Taxonmy for Team Members


===============================================*/
function companyRegisterTaxonomy() {

	$labels = array(
		'name'                       => _x( 'Positions', 'Taxonomy General Name', 'team-member-position' ),
		'singular_name'              => _x( 'Position', 'Taxonomy Singular Name', 'team-member-position' ),
		'menu_name'                  => __( 'Positions', 'team-member-position' ),
		'all_items'                  => __( 'All Positions', 'team-member-position' ),
		'parent_item'                => __( 'Parent Position', 'team-member-position' ),
		'parent_item_colon'          => __( 'Parent Position:', 'team-member-position' ),
		'new_item_name'              => __( 'New Position Name', 'team-member-position' ),
		'add_new_item'               => __( 'Add New Position', 'team-member-position' ),
		'edit_item'                  => __( 'Edit Position', 'team-member-position' ),
		'update_item'                => __( 'Update Position', 'team-member-position' ),
		'view_item'                  => __( 'View Position', 'team-member-position' ),
		'separate_items_with_commas' => __( 'Separate positions with commas', 'team-member-position' ),
		'add_or_remove_items'        => __( 'Add or remove positions', 'team-member-position' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'team-member-position' ),
		'popular_items'              => __( 'Popular Positions', 'team-member-position' ),
		'search_items'               => __( 'Search positions', 'team-member-position' ),
		'not_found'                  => __( 'Not Found', 'team-member-position' ),
		'no_terms'                   => __( 'No Positions', 'team-member-position' ),
		'items_list'                 => __( 'Positions list', 'team-member-position' ),
		'items_list_navigation'      => __( 'Positions list navigation', 'team-member-position' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'team-member-position', array( 'company-team-members' ), $args );

}
add_action( 'init', 'companyRegisterTaxonomy', 0 );

/*============================================


 Loads single and archive template files


===============================================*/

function loadSingleTeamMemberTemplate($template){
  global $post;

  if($post->post_type == 'company-team-members'){
    return plugin_dir_path(__FILE__) . 'templates/single-company-team-members.php';
  }

  return $template;
}

add_filter('single_template', 'loadSingleTeamMemberTemplate');


function loadArchiveTeamMemberTemplate( $archive_template ) {
   global $post;
   $plugin_root_dir = WP_PLUGIN_DIR . "/" . "company-staff-directory/";

   if (is_archive() && get_post_type($post) == 'company-team-members') {
        $archive_template = $plugin_root_dir . '/templates/archive-company-team-members.php';
   }
   return $archive_template;
  }

add_filter( 'archive_template', 'loadArchiveTeamMemberTemplate' );




/*============================================


 Registering Advanced Custom Fields


===============================================*/

if(function_exists('acf_add_local_field_group')){
  acf_add_local_field_group(array(
    'key'     => 'team-member-main-info',
    'title'   => 'Team Member Main Info',
    'fields'  => array(
      array (
        'key'   => 'team-member-phone',
        'label' => 'Phone',
        'name'  => 'team-member-phone',
        'type'  => 'text'
      ),

      array (
        'key'   => 'team-member-email',
        'label' => 'Email',
        'name'  => 'team-member-email',
        'type'  => 'email'
      ),

      array (
        'key'   => 'team-member-office',
        'label' => 'Office Address',
        'name'  => 'team-member-office',
        'type'  => 'wysiwyg'
      ),

      array (
        'key'   => 'team-member-bio',
        'label' => 'Bio',
        'name'  => 'team-member-bio',
        'type'  => 'wysiwyg'
      ),
    ),

    'location' => array(
      array(
        array(
          'param'     => 'post_type',
          'operator'  => '==',
          'value'     => 'company-team-members'
        ),
      ),
    ),
  ));
}
?>
