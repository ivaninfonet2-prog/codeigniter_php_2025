<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
    }

    public function index()
    {
        $data = [
            'titulo'       => 'Inicio - UNLa Tienda',
            'espectaculos' => $this->Espectaculo_modelo->obtener_espectaculos(),
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg')
        ];

        $this->load->view('templates/header', $data);   // Header con título dinámico
        $this->load->view('inicio/index', $data);       // Contenido principal
        $this->load->view('templates/footer');          // Footer
    }
}
