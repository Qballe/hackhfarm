<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('html');
		$this->load->library('ion_auth');
	}

	public function index() {
		$this->general_model->checkLogin();

		$user = (array)$this->ion_auth->user()->row();

		$data["user"]["id"] = $user['id'];
		$data["user"]["name"] = $user['name'];
		$data["user"]["last_name"] = $user['last_name'];

		$this->load->view( 'main', $data );
	}
}
?>