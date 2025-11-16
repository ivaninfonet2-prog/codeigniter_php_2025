
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
        $this->load->library('session');
        $this->load->helper('url_helper');
    }
    
    public function index() 
    {
        // Cargar header con navbar responsive
        $this->load->view('templates/header'); 
        $this->load->view('formularios/formulario_login');
        $this->load->view('templates/footer');
    }

    public function autenticar()
    {
        $nombre_usuario = $this->input->post('nombre_usuario');
        $palabra_clave = $this->input->post('palabra_clave');

        // Validar credenciales
        $usuario = $this->Usuario_modelo->obtener_usuario($nombre_usuario, $palabra_clave);
        $id_usuario = $this->Usuario_modelo->obtener_id_usuario($nombre_usuario);

        // Guardar id en sesión
        $this->session->set_userdata('id_usuario', $id_usuario);

        if ($usuario) 
        {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('rol_id', $usuario->rol_id);

            // Header común
            $this->load->view('templates/header');

            if ($usuario->rol_id === '2') 
            {
                $this->load->view('vista_administrador'); // Vista administrador
            } 
            else 
            {
                $this->load->view('vista_usuario'); // Vista usuario normal
            }

            // Footer común
            $this->load->view('templates/footer');
        }    
        else 
        {
            $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
            
            // Header común
            $this->load->view('templates/header');
            $this->load->view('formularios/formulario_login'); 
            $this->load->view('templates/footer');
        }
    }
    
    public function logout() 
    {
        // Destruye la sesión activa
        $this->session->sess_destroy();

        // Redirige al inicio de sesión
        $this->load->view('templates/header');
        $this->load->view('cerrar_sesion');
        $this->load->view('templates/footer');
    }
}
