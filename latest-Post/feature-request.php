<?php

function feature_request() {
$args = array();
	
register_post_type('test', '$args');
}
add_action('init', 'feature_request');

?>
