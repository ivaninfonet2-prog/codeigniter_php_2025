
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller 
{
    public function index() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Contacto de UNLa Tienda';

        // Cargar header común
        $this->load->view('header_footer/header_footer_principal', $data);

        // Vista principal de la sección "Contacto"
        $this->load->view('contacto_principal/body_contacto_principal', $data);

        // Cargar footer común
        $this->load->view('footer_footer/footer_footer_principal');
    }

    public function contacto_login() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('header/header_login', $data);

       // Vista principal
        $this->load->view('contacto_principal/body_contacto_principal', $data);

        // Footer común
        $this->load->view('footer/footer_login');
    }

    public function contacto_registrar() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('header/header_registrar', $data);

       // Vista principal
        $this->load->view('contacto_principal/body_contacto_principal', $data);

        // Footer común
        $this->load->view('footer/footer_registrar');
    }

    public function contacto_usuario() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('header/header_usuario', $data);

        // Vista principal de la sección "Contacto"
        $this->load->view('contacto_principal/body_contacto_principal', $data);

        // Cargar footer común
        $this->load->view('footer/footer_usuario');
    }

    public function contacto_administrador() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('contacto_administrador/header_contacto_administrador', $data);

        // Vista principal de la sección "Contacto"
        $this->load->view('contacto_administrador/body_contacto_administrador', $data);

        // Cargar footer común
        $this->load->view('contacto_administrador/footer_contacto_administrador');
    }

}
?>
