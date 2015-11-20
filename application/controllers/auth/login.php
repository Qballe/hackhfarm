<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library( 'ion_auth' );
	} //fine function

	public function index()
	{
		$this->load->helper( 'form' );
		$this->load->library( 'form_validation' );
		$this->form_validation->set_rules( 'identity', 'Email', 'xss_clean|required|htmlentities|valid_email' );
		$this->form_validation->set_rules( 'password', 'Password', 'trim|xss_clean|required' );

		if ( $this->form_validation->run() ) {
			$identity = $this->input->post( "identity", true );
			$password = $this->input->post( "password", true );
			
			if ( $this->ion_auth->login( $identity, $password, TRUE ) ) {
				redirect( "/main" );
			}
			else {
				$this->session->set_flashdata( 'message', $this->ion_auth->errors() );
				redirect( "/login" );
			}
		}

		$this->session->set_flashdata( 'message', $this->ion_auth->errors() );
		redirect( "/login" );
	} //fine function
} //fine controller
?>