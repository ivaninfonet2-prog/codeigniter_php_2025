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
    // Obtener usuario por email y opcionalmente contraseña
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
        $this->db->where('id_usuario', $id_usuario); 
        return $this->db->get('usuarios')->row(); 
    }

    // -------------------------------------------------------
    // Obtener email de usuario por ID
    // -------------------------------------------------------
    public function get_usuario_email($id_usuario)  
    {
        $this->db->select('nombre_usuario'); // nombre_usuario es el email
        $this->db->from('usuarios');
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array(); // Devuelve array con 'nombre_usuario'
        }

        return null; // Si no encuentra nada
    }

    // -------------------------------------------------------
    // Eliminar usuario
    // -------------------------------------------------------
    public function eliminar_usuario($id_usuario)
    {
        return $this->db->delete('usuarios', ['id_usuario' => $id_usuario]);
    }

public function obtener_usuarios_estandar()
{
    // Solo usuarios estándar (rol_id = 1)
    $this->db->where('rol_id', 1);
    return $this->db->get('usuarios')->result();
}

}
?>
