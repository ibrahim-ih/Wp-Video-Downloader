<?php

/*
Plugin Name: Vi Dw
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This plugin allow user to download facebook and youtube video.
Version: 1.0
Author: Ibrahim Haouari
Author URI: https://twitter.com/ibrahim_haouari
License: A "Slug" license name e.g. GPL2
*/

define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

	require_once (MY_PLUGIN_PATH.'admin/wp-vidw-admin.php');
	require_once (MY_PLUGIN_PATH.'admin/wp-vidw-cpt.php');
	require_once (MY_PLUGIN_PATH.'admin/wp-vidw-fields.php');
	require_once (MY_PLUGIN_PATH.'public/wp-vidw-provider.php');

	class Wp_ViDw_Lang {
		public function init() {
			add_action( 'init', array( $this, 'on_loaded' ) );
		}

		public function on_loaded() {
			$domain = 'ihvidw';
			$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
			load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
			load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

			}



	}
	$vidw_lang = new Wp_ViDw_Lang();
	$vidw_lang->init();


