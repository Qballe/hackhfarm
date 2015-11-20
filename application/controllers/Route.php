<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends CI_Controller {
  public function index() {
    print_r($this->router->routes);
  }
}