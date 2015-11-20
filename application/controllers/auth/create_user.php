<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Create_user extends CI_Controller {
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
			
			if ( ! $this->ion_auth->email_check( $email ) ) {
				$uid = $this->ion_auth->register(
					$vanity,
					$password,
					$email,
					$extend,
					array(
						'5172eae4246a523f1900034b'
					)
				);

				$this->mongo_db->where( array( 'username' => $vanity ) )->set( 'user_id', $c )->update( 'users' );
			}
		}

		//$this->session->set_flashdata( 'message', $this->ion_auth->errors() );
		redirect( "/login" );
	} //fine function
} //fine controller
?>