<?php
if (!class_exists('Wp_ViDw_Provider')){
	class Wp_ViDw_Provider{
		function init(){
			add_action('wp_enqueue_scripts', array( $this,'add_style'));
			add_shortcode( 'vidw', array( $this,'vidw_form') );
			add_action( 'wp_ajax_vidw_response_action', array( $this,'vidw_response_action') );
			add_action( 'wp_ajax_nopriv_vidw_response_action', array( $this,'vidw_response_action') );
			add_action('wp_enqueue_scripts', array( $this,'add_result_style'));

		}
		function add_style(){
			wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' );
			wp_register_script( 'script', plugins_url('js/scripts.js',__FILE__), array('jquery') );

// Localize the script with new data

		}
		function add_result_style(){
			$translation_array = array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'success_msg' => __( 'Success!', 'ihvidw' ),
				'notic_msg' => __('Check that the field are valid!', 'ihvidw'),
				'wrong_msg' => __('Please, fill the field !', 'ihvidw'),
				'info_msg' => __('title','ihvidw'),
			);
			wp_localize_script( 'script', 'js_content', $translation_array );

			wp_enqueue_script( 'script' );
		}
		function vidw_form() {


			require( 'wp-vidw-front.php' );

			//Call the $Form
			echo $vidw_front;


		}
		function vidw_response_action(){
			if (isset($_POST['ih-url']) && !empty($_POST['ih-url'] )){
				$url = esc_url($_POST['ih-url'],'https');

				if (isset($url) || $url != null){
					//$url = wp_parse_url($url, -1);
					if ($this->url_reader($url, 0) == 'https'){
						switch ($this->url_reader($url,1)){
							case 'www.facebook.com':
								$owner = 'facebook';
								$video = 'video1.mp4';
								/*$videoLink = 'https://video.ftun3-1.fna.fbcdn.net/v/t42.1790-2/23461378_309559106118238_3934640439176462336_n.mp4?efg=eyJ2ZW5jb2RlX3RhZyI6InN2ZV9zZCJ9&oh=8a964526d81d87d3925333ca237c1e75&oe=5A0A323C';
								file_put_contents($video,file_get_contents($videoLink));*/

								/*$url_test = file_get_html('https://www.facebook.com/150141245593495/videos/156186524988967/');

								foreach ($url_test->find('div._5wj- p')  as $element)
$res = $element;*/
								$url_test = 'https://www.facebook.com/150141245593495/videos/156186524988967/';
								/*$images = array();
								foreach($url_test->find('img') as $img) {
									$images[] = $img->src;*/
								$res = file_get_contents($url_test);

								wp_send_json($res);//owner : facebook
								break;
							case 'www.youtube.com':
								$owner = 'facebook';

								wp_send_json('youtube');//owner: youtube
								break;
							default:
								wp_send_json('another website');

						}
					}

				}else{
					wp_send_json('error');
				}



			}else{
				wp_send_json('error');
			}
		}
		function url_reader($url, $i){
			return wp_parse_url($url, $i);
		}

		function create($title,
						$description,
						$owner,
						$created_time,
						$hd_link,
						$sd_link){
			try{
				$yt = VideoFactory::create($title,
					$description,
					$owner,
					$created_time,
					$hd_link,
					$sd_link);
				echo $yt->getTitle();
				$result = [
					'title' => $title,
					'description' => $description,
					'owner' => $owner,
					'created_time'=> $created_time,
					'hd_link' => $hd_link,
					'sd_link' => $sd_link,
				];
				return $result;
			}catch (Exception $e){
				return $e->getMessage();
			}
		}

	}
}

$provider = new Wp_ViDw_Provider();
$provider->init();