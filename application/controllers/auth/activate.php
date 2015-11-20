<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Activate extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library( 'ion_auth' );
	} //fine function

	public function index()
	{
		$this->load->helper( 'form' );
		$this->load->library( 'form_validation' );
		$this->form_validation->set_rules( 'email', 'Email', 'xss_clean|required|htmlentities|valid_email' );
		$this->form_validation->set_rules( 'password', 'Password', 'trim|xss_clean|required' );

		if ( $this->form_validation->run() ) {
			$email = $this->input->post( "email", true );
			
			if ( $this->ion_auth->login( $email, $password, TRUE ) ) {
				redirect( "/demo" );
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


/*

*/
?>