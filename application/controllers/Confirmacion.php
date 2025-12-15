<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmacion extends CI_Controller 
{

    /** Confirmar cerrar sesión */
    public function cerrar_sesion()
    {
        $this->load->view('confirmacion/cerrar_sesion');
    }

    /** Confirmar cancelar reserva */
    public function cancelar_reserva()
    {
        $this->load->view('confirmacion/cancelar_reserva');
    }

    /** Confirmar eliminar usuario */
    public function eliminar_usuario()
    {
        $this->load->view('confirmacion/eliminar_usuario');
    }

    /** Confirmar eliminar espectáculo */
    public function eliminar_espectaculo()
    {
        $this->load->view('confirmacion/eliminar_espectaculo');
    }
}
