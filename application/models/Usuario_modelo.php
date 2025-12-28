<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_modelo extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // -------------------------------------------------------
    // Registrar usuario
    // -------------------------------------------------------
    public function registrar_usuario($data) 
    {
        return $this->db->insert('usuarios', $data);
    }

    // -------------------------------------------------------
    // Verificar si usuario existe por email o DNI
    // -------------------------------------------------------
    public function verificar_usuario_existente($email, $dni) 
    {
        $this->db->where('nombre_usuario', $email);
        $this->db->or_where('dni', $dni);
        return $this->db->get('usuarios')->num_rows() > 0;
    }

    // -------------------------------------------------------
    // Obtener usuario por email (y opcional password)
    // -------------------------------------------------------
    public function obtener_usuario($nombre_usuario, $palabra_clave = null) 
    {
        $this->db->where('nombre_usuario', $nombre_usuario);

        if ($palabra_clave !== null) {
            $this->db->where('palabra_clave', $palabra_clave);
        }

        return $this->db->get('usuarios')->row();
    }

    // -------------------------------------------------------
    // Obtener todos los usuarios
    // -------------------------------------------------------
    public function obtener_usuarios()
    {
        return $this->db->get('usuarios')->result();
    }

    // -------------------------------------------------------
    // Obtener usuario por ID
    // -------------------------------------------------------
    public function obtener_usuario_por_id($id_usuario) 
    { 
        return $this->db
            ->where('id_usuario', $id_usuario)
            ->get('usuarios')
            ->row(); 
    }

    // -------------------------------------------------------
    // ACTUALIZAR USUARIO (NECESARIO PARA EDITAR)
    // -------------------------------------------------------
    public function actualizar_usuario($id_usuario, $data)
    {
        return $this->db
            ->where('id_usuario', $id_usuario)
            ->update('usuarios', $data);
    }

    // -------------------------------------------------------
    // Obtener email de usuario por ID
    // -------------------------------------------------------
    public function get_usuario_email($id_usuario)  
    {
        $this->db->select('nombre_usuario');
        $this->db->from('usuarios');
        $this->db->where('id_usuario', $id_usuario);

        $query = $this->db->get();

        return ($query->num_rows() > 0)
            ? $query->row_array()
            : null;
    }

    // -------------------------------------------------------
    // Eliminar usuario
    // -------------------------------------------------------
    public function eliminar_usuario($id_usuario)
    {
        return $this->db->delete('usuarios', [
            'id_usuario' => $id_usuario
        ]);
    }

    // -------------------------------------------------------
    // Obtener solo usuarios estándar
    // -------------------------------------------------------
    public function obtener_usuarios_estandar()
    {
        return $this->db
            ->where('rol_id', 1)
            ->get('usuarios')
            ->result();
    }
}
