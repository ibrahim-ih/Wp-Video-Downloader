<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ibrahim
 * Date: 13/11/2017
 * Time: 14:34
 */

class FbVideo {
	protected $title;
	protected $description;
	protected $owner;
	protected $created_time;
	protected $hd_link;
	protected $sd_link;

	/**
	 * FbVideo constructor.
	 *
	 * @param $title
	 * @param $description
	 * @param $owner
	 * @param $created_time
	 * @param $hd_link
	 * @param $sd_link
	 */
	public function __construct( $title, $description, $owner, $created_time, $hd_link, $sd_link ) {
		$this->title        = $title;
		$this->description  = $description;
		$this->owner        = $owner;
		$this->created_time = $created_time;
		$this->hd_link      = $hd_link;
		$this->sd_link      = $sd_link;
	}

	/**
	 * @param mixed $title
	 */
	public function setTitle( $title ) {
		$this->title = $title;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription( $description ) {
		$this->description = $description;
	}

	/**
	 * @param mixed $owner
	 */
	public function setOwner( $owner ) {
		$this->owner = $owner;
	}

	/**
	 * @param mixed $created_time
	 */
	public function setCreatedTime( $created_time ) {
		$this->created_time = $created_time;
	}

	/**
	 * @param mixed $hd_link
	 */
	public function setHdLink( $hd_link ) {
		$this->hd_link = $hd_link;
	}

	/**
	 * @param mixed $sd_link
	 */
	public function setSdLink( $sd_link ) {
		$this->sd_link = $sd_link;
	}


}