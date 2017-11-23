<?php
if ( !defined('ABSPATH')) {
	exit;
}
	class Wp_ViDw_admin{
		public function init(){
			add_action  ('admin_enqueue_scripts', array($this,'ih_admin_enqueue_scripts'));
			add_action( 'after_setup_theme', array($this,'ih_vidw_setup') );
		}
		public function ih_admin_enqueue_scripts(){
			global $pagenow, $typenow;

			if (($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'ihvidw') {
				wp_enqueue_style('dwwp-admin-css', plugins_url( 'css/style.css', __FILE__));
			}
	}
	public function ih_vidw_setup(){
		$domain = 'ih-vidw';
		load_theme_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain );
		load_theme_textdomain( $domain, get_stylesheet_directory() . '/languages' );
		load_theme_textdomain( $domain, get_template_directory() . '/languages' );
	}
	}


$vidw_admin = new Wp_ViDw_admin();
$vidw_admin->init();
