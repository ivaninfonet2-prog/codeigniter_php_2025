
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Politicas extends CI_Controller {
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('footer/politicas');
        $this->load->view('templates/footer');
    }
}
