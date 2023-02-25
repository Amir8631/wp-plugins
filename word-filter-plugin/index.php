<?php

/*
	PLugin Name: Our Word Filter Plugin
	Description: Replaces a list of words.
	Version: 1.0 
	Author: Amir
*/

if( ! defined('ABSPATH') ) exit;

class OurWordFilterPlugin {
	function __construct() {
		add_action('admin_menu', array($this, 'ourMenu'));
	}

	function ourMenu() {
		$mainPageHook =	add_menu_page('Words To Filter', 'Word Filter', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'), 'dashicons-star-filled', 100);
		add_submenu_page('ourwordfilter', 'Word Filter Options', 'Words To Filter','Words List', 'manage_options', 'word-filter-options', 'ourwordfilter', array($this, 'wordFilterPage'));
		add_submenu_page('ourwordfilter', 'Word Filter Options', 'Options', 'manage_options', 'word-filter-options', array($this, 'optionsSubPage'));
		add_action("load-{$mainPageHook}", array($this, 'mainPageAssests'));
	}

	function mainPageAssests() {
    	wp_enqueue_style('filterAdminCss', plugin_dir_url(__FILE__) . 'styles.css');

	}

	function wordFilterPage() { ?>
		<div class="wrap">
			<h1>Words Filter</h1>
			<form method="POST">
				<label for="plugin_words_to_filter"><p>Enter a <strong> comma-separated</strong> list of words to filter from your site's content</p></label>
				<div class="word-filter__flex-container">
					<textarea name="plugin_words_to_filte" id="plugin_words_to_filte" placeholder="bad, mean, awful, horrible"></textarea>
				</div>
				<input type="submit" name="submit" id="submit" class="button button-primary" value="save changes">
			</form>
		</div>
	<?php }

	function optionsSubPage() { ?>
		Hello World from me.
	<?php }
}

$OurWordFilterPlugin = new OurWordFilterPlugin();
























































?>