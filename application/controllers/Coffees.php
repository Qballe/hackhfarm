<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('form_validation'));
	}

	public function drink($user1, $user2) {
		$this->general_model->checkLogin();

		if ($this->coffees_model->register($user1, $user2)) {
			$this->notifications_model->push($user1, 'coffee', 'Coffee with: '.$user2);
			$this->notifications_model->push($user2, 'coffee', 'Coffee with: '.$user1);
			redirect('coffee', 'refresh');
		}
	}
}
