
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('footer/contacto');
        $this->load->view('templates/footer');
    }
}
