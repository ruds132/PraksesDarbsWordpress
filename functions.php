<?php
add_theme_support('post-thumbnails');
add_post_type_support( 'custom-post-type', 'thumbnail' );    
function create_post_type() {
        register_post_type( 'custom-post-type',
            array(
                'labels' => array(
                    'name' => __( 'Custom Post Type' ),
                    'singular_name' => __( 'CustomPost' )
                ),
                'public' => true,
                'has_archive' => true
            )
        );
        register_taxonomy(
            'Overwatch Heros',
            'custom-post-type',
            array(
                'label' => __( 'Overwatch Heroes' ),
                'rewrite' => array( 'slug' => 'overwatchHeroes' ),
                'hierarchical' => true,
            )
        );
    }
    add_action( 'init', 'create_post_type' );

function enqueue_bootstrap() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array('jquery'), '', true);
    wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');

function register_my_menu() {
    register_nav_menus([
        'main-menu' => esc_html__('Main Menu', 'myfirsttheme'),
    ]);
}
add_action( 'init', 'register_my_menu' );

?>