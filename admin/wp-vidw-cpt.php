<?php
	class Wp_ViDw_cpt{
		public function init(){
			add_action('init', array( $this, 'create_post_type' ));
		}

		public function create_post_type(){
			$singular = 'Video Downloader';
			$plural = 'Videos downloader';
			$slug = str_replace( ' ', '_', strtolower( $singular ) );
			$labels = array(
				'name' 					=> $plural,
				'singular_name' 		=> $singular,

			);
			$args = array(
				'labels'              	  => $labels,
				'public'              => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'show_in_nav_menus'   => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => 10,
				'menu_icon'           => 'dashicons-video-alt',
				'can_export'          => true,
				'delete_with_user'    => false,
				'hierarchical'        => false,
				'has_archive'         => true,
				'query_var'           => true,
				'capability_type'     => 'post',
				'has_archive' => true,
				'capabilities' 		  => array(
					'create_posts'    => 'do_not_allow',
				),

				'map_meta_cap'        => true,
				'rewrite'             => array(
					'slug' => $slug,
					'with_front' => true,
					'pages' => true,
					'feeds' => true,
				),
				'supports'            => array(
					''
				)
			);
			register_post_type( 'ihvidw', $args);
		}
	}
	$cpt = new Wp_ViDw_cpt();
	$cpt->init();


