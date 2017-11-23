<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ibrahim
 * Date: 13/11/2017
 * Time: 14:25
 */

class Video {

protected $title;
protected $description;
protected $owner;
protected $created_time;
protected $hd_link;
protected $sd_link;

	/**
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @return mixed
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @return mixed
	 */
	public function getOwner() {
		return $this->owner;
	}

	/**
	 * @return mixed
	 */
	public function getCreatedTime() {
		return $this->created_time;
	}

	/**
	 * @return mixed
	 */
	public function getHdLink() {
		return $this->hd_link;
	}

	/**
	 * @return mixed
	 */
	public function getSdLink() {
		return $this->sd_link;
	}


}