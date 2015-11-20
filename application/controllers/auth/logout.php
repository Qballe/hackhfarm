<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Logout extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library( 'ion_auth' );
	}

	public function index()
	{
		$this->ion_auth->logout();
		redirect( "/login" );
	} //fine function
} //fine controller
?>