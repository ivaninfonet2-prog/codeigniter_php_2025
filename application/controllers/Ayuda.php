
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayuda extends CI_Controller {
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('footer/ayuda');
        $this->load->view('templates/footer');
    }
}
