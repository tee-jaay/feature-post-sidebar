 <?php
/*
Plugin Name: Featured Image Sidebar Widget
Plugin URI: https://teejaay.me
Description: Displays the featured image of the current post in the sidebar.
Version: 1.0
Author: Your Name
Author URI: https://teejaay.me
License: GPL2
*/

class Featured_Image_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'featured_image_widget',
            __( 'Featured Image Widget', 'text_domain' ),
            array( 'description' => __( 'Displays the featured image of the current post in the sidebar.', 'text_domain' ), )
        );
    }

    public function widget( $args, $instance ) {
        if ( is_singular( 'post' ) ) {
            $image = get_the_post_thumbnail();
            if ( ! empty( $image ) ) {
                echo $args['before_widget'];
                echo $image;
                echo $args['after_widget'];
            }
        }
    }
}

function register_featured_image_widget() {
    register_widget( 'Featured_Image_Widget' );
}
add_action( 'widgets_init', 'register_featured_image_widget' );

