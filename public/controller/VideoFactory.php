<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ibrahim
 * Date: 13/11/2017
 * Time: 14:31
 */

require_once( '../model/Video.php' );
require_once( '../model/FbVideo.php' );
require_once ('../model/YtVideo.php');
class VideoFactory {
	public static function create($title,
		$description,
		$owner,
		$created_time,
		$hd_link,
		$sd_link){
		switch ($owner){
			case 'facebook':
				$obj = new FbVideo($title,
					$description,
					$owner,
					$created_time,
					$hd_link,
					$sd_link);
				break;
			case 'youtube':
				$obj = new YtVideo($title,
					$description,
					$owner,
					$created_time,
					$hd_link,
					$sd_link);
				break;
			default:
				throw new Exception(_e('Owner not found','ihvidw'));
		}
		return $obj;
	}

}