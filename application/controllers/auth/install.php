<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Install extends CI_Controller {
	public $assets_dir;

	public function __construct() {
		parent::__construct();
		$this->load->library('ion_auth');
	}

	public function us($password=false) {
		$emails = array(
			'alex.zanardo' => 'azanardo@goresponsa.com',
			'gabriele.antoniazzi' => 'gantoniazzi@goresponsa.com',
			'francesco.guerra' => 'fguerra@goresponsa.com',
			'fabio.ros' => 'fabio.ros90@gmail.com',
			'chiara.bigarella' => 'chiara.bigarella1@gmail.com',
			'stefano.franchetto' => 'sfranchetto@digitalaccademia.com',
			'massimo.garavet' => 'mgaravet@digitalaccademia.com',
		);

		if($password && $password=="waaay") {
			$c = 9;

			foreach($emails as $vanity => $email) {
				$extend = array();

				list($first_name, $last_name) = explode('.', $vanity);

				$extend['first_name'] = ucfirst($first_name);
				$extend['last_name'] = ucfirst($last_name);

				if (!$this->ion_auth->email_check($email)) {
					$uid = $this->ion_auth->register($vanity, $password, $email,$extend,
																					array(
																						'5172eae4246a523f1900034b'
																						));
					$c--;
				}
			}
		}
		else
		{
			echo "NO INSTALL";
		}
	}
}