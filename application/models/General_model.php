<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class General_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->library('ion_auth');
	}

	public function checkLogin() {
		if (!$this->ion_auth->logged_in()) {
			redirect( '/login' );
		}
	}
}