<?php

function add_cpt()
{
  // Publications 
  $labels = array(
    'name'                  => _x('Publications', 'Post Type General Name', 'alfred'),
    'singular_name'         => _x('Publication', 'Post Type Singular Name', 'alfred'),
    'menu_name'             => __('Publication', 'alfred'),
    'name_admin_bar'        => __('Publication', 'alfred'),
    'archives'              => __('Item Archives', 'alfred'),
    'attributes'            => __('Item Attributes', 'alfred'),
    'parent_item_colon'     => __('Parent Item:', 'alfred'),
    'all_items'             => __('All Items', 'alfred'),
    'add_new_item'          => __('Ajouter une Publication', 'alfred'),
    'add_new'               => __('Ajouter', 'alfred'),
    'new_item'              => __('Nouveau', 'alfred'),
    'edit_item'             => __('Modifier', 'alfred'),
    'update_item'           => __('Mettre à jour', 'alfred'),
    'view_item'             => __('Voir', 'alfred'),
    'view_items'            => __('Voir', 'alfred'),
    'search_items'          => __('Rechercher', 'alfred'),
    'not_found'             => __('Not found', 'alfred'),
    'not_found_in_trash'    => __('Not found in Trash', 'alfred'),
    'featured_image'        => __('Featured Image', 'alfred'),
    'set_featured_image'    => __('Set featured image', 'alfred'),
    'remove_featured_image' => __('Remove featured image', 'alfred'),
    'use_featured_image'    => __('Use as featured image', 'alfred'),
    'insert_into_item'      => __('Insert into item', 'alfred'),
    'uploaded_to_this_item' => __('Uploaded to this item', 'alfred'),
    'items_list'            => __('Items list', 'alfred'),
    'items_list_navigation' => __('Items list navigation', 'alfred'),
    'filter_items_list'     => __('Filter items list', 'alfred'),
  );
  $args = array(
    'label'                 => __('Publication', 'alfred'),
    'description'           => __('Les Publications', 'alfred'),
    'labels'                => $labels,
    'supports'              => array('title', 'thumbnail',  'editor'),
    'taxonomies'            => array(),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'query_var'             => true,
    'capability_type'       => 'page',
    'rewrite' => array('slug' => 'contenus-prives/publications', 'with_front' => false, 'pages' => true,),
  );
  register_post_type('publications', $args);
}
add_action('init', 'add_cpt', 10);


add_filter('wpseo_breadcrumb_links', 'customize_breadcrumb_for_reunions');
function customize_breadcrumb_for_reunions($links)
{

  if (is_singular('publications') || is_post_type_archive('publications')) {

    $breadcrumb = array(
      'url' => site_url('/contenus-prives/'),
      'text' => 'Contenus privés',
    );


    if (!empty($links)) {
      array_splice($links, 1, 0, array($breadcrumb));
    }
  }

  return $links;
}


add_action('init', 'my_register_menus_child');

function my_register_menus_child()
{
  register_nav_menus(
    array(
      'menu-lateral-5' => __('Menu 5')
    )
  );
}

if (!current_user_can('administrator')) {
  add_filter('show_admin_bar', '__return_false');
}
# add_filter( 'um_disable_dynamic_global_css', '__return_true' );
