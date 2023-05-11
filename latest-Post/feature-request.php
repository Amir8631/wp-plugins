<?php

function feature_request() {
	register_post_type('feature_request', array(
		'public' => true,
		'labels' => array(
		  'name' => "Feature Request"
		),
	    'menu_icon' => 'dashicons-format-chat'
	));

}
add_action('init', 'feature_request');

?>
