<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','language'));
	}

	public function companies($term = '') {

	}

	public function do($term = '') {

		//$this->load->view('welcome_message');
	}
}
