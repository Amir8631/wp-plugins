<?php


/*
Plugin Name: Latest Posts
Description: this is just little practice
Version: 1.0
Author: Amir
*/


function wpcat_postsbycategory() {


$the_query = new WP_Query( array( 'posts' => 'posts', 'posts_per_page' => 10 ) ); 



if ( $the_query->have_posts() ) {


    $string = '<ul class="postsbycategory widget_recent_entries">';


    while ( $the_query->have_posts() ) {


        $the_query->the_post();

            if ( has_post_thumbnail() ) {
            

            $string .= '<li>';

            $string .= '<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_post_thumbnail($post_id, array( 50, 50) ) . get_the_title() .'</a></li>';

            } else { 


            $string .= '<li><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a></li>';


            }
            }
    } else {


    // no posts found
}


$string .= '</ul>';



return $string;


}
wp_reset_postdata();

add_shortcode('categoryposts', 'wpcat_postsbycategory');

add_filter('widget_text', 'do_shortcode');


 





?>
