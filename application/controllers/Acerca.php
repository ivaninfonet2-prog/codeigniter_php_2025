

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acerca extends CI_Controller {
    public function index() {
        // Cargar header común
        $this->load->view('templates/header');
        
        // Vista principal de la sección "Acerca"
        $this->load->view('footer/acerca'); 
        
        // Cargar footer común
        $this->load->view('templates/footer');
    }
}
