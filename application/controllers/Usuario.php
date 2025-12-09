
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
        $this->load->model('Reserva_modelo');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper('url');
    }

    private function datos_base($titulo = 'Inicio - UNLa Tienda')
    {
        return 
        [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => $titulo
        ];
    }

    private function validar_usuario($es_nuevo = true)
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email' . ($es_nuevo ? '|is_unique[usuarios.nombre_usuario]' : ''));

        if ($es_nuevo) 
        {
            $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]');
        }
    }

    /* ------------------ MÉTODOS DE USUARIO ------------------ */

    public function index()
    {
        if (!$this->session->userdata('logged_in'))
        {
            redirect('login');
            return;
        }

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");

        $id_usuario = $this->session->userdata('id_usuario');
        $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);

        $data = $this->datos_base();
        $data['titulo']   = 'UNLa Tienda';
        $data['nombre']   = $usuario ? $usuario->nombre : '';
        $data['apellido'] = $usuario ? $usuario->apellido : '';

        $this->load->view('usuario/header_usuario', $data);
        $this->load->view('usuario/body_usuario', $data);
        $this->load->view('usuario/footer_usuario', $data);
    }

    public function usuario_espectaculos()
    {
        $data = 
        [
            'titulo'       => "Cartelera de Espectáculos",
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $this->Espectaculo_modelo->obtener_espectaculos()
        ];

        $this->load->view('usuario_espectaculos/usuario_espectaculos_header', $data);
        $this->load->view('usuario_espectaculos/usuario_espectaculos_body', $data);
        $this->load->view('usuario_espectaculos/usuario_espectaculos_footer');
    }

    public function usuario_reservas()
    {
        $id_usuario = $this->session->userdata('id_usuario');
        if ($id_usuario === null) 
        {
            echo "No hay un usuario en la sesión. Por favor, inicia sesión.";
            return;
        }

        $data = 
        [
            'titulo'   => "Mis Reservas",
            'fondo'    => base_url('activos/imagenes/mi_fondo.jpg'),
            'reservas' => $this->Reserva_modelo->obtener_reservas($id_usuario)
        ];

        $this->load->view('usuario_reservas/usuario_reservas_header', $data);
        $this->load->view('usuario_reservas/usuario_reservas_body', $data);
        $this->load->view('usuario_reservas/usuario_reservas_footer');
    }

    public function usuario_reservas_detalle($id_reserva)
    {
        $id_usuario = $this->session->userdata('id_usuario');
        if ($id_usuario === null) 
        {
            echo "No hay un usuario en la sesión. Por favor, inicia sesión.";
            return;
        }

        $this->db->select('reservas.id_reserva, reservas.cantidad, reservas.fecha_reserva, reservas.monto_total,
                           espectaculos.nombre as nombre_espectaculo, espectaculos.fecha as fecha_espectaculo,
                           espectaculos.precio, espectaculos.disponibles');
        $this->db->from('reservas');
        $this->db->join('espectaculos', 'reservas.espectaculo_id = espectaculos.id_espectaculo');
        $this->db->where('reservas.id_reserva', $id_reserva);
        $this->db->where('reservas.usuario_id', $id_usuario);
        $reserva = $this->db->get()->row_array();

        if ( ! $reserva) 
        {
            echo "Reserva no encontrada o no pertenece al usuario.";
            return;
        }

        $data = 
        [
            'fondo'   => base_url('activos/imagenes/mi_fondo.jpg'),
            'reserva' => $reserva
        ];

        $this->load->view('usuario_reservas_detalle/header_usuario_reservas_detalle', $data);
        $this->load->view('usuario_reservas_detalle/body_usuario_reservas_detalle', $data);
        $this->load->view('usuario_reservas_detalle/footer_usuario_reservas_detalle', $data);
    }

    /* ------------------ MÉTODOS CRUD ADMIN ------------------ */

   public function crear_usuario()
{
    $this->load->library('form_validation');

    // Reglas de validación
    $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
    $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuarios.nombre_usuario]');
    $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]');
    $this->form_validation->set_rules('password_confirm', 'Confirmar Contraseña', 'required|matches[password]');

    if ($this->form_validation->run() === FALSE) {
        // Mostrar formulario con errores
        $data = $this->datos_base('Crear Usuario');
        $data['fondo'] = base_url('activos/imagenes/fondo.jpg'); // ejemplo
        $this->load->view('editar_usuario/header_editar_usuario', $data);
        $this->load->view('crear_usuario/body_crear_usuario', $data);
        $this->load->view('editar_usuario/footer_editar_usuario', $data);
    } else {
        // Preparar datos para insertar
        $usuario_data = [
    'nombre'         => $this->input->post('nombre'),
    'apellido'       => $this->input->post('apellido'),
    'nombre_usuario' => $this->input->post('email'),
    'palabra_clave'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    'rol_id'         => 1 // Usuario estándar por defecto
];


        $insert = $this->Usuario_modelo->registrar_usuario($usuario_data);

        if ($insert) {
            $this->session->set_flashdata('mensaje_exito', 'Usuario creado exitosamente.');
            redirect('usuario/crear_usuario'); // vuelve al formulario con mensaje
        } else {
            $this->session->set_flashdata('mensaje_error', 'Ocurrió un error al crear el usuario.');
            redirect('usuario/crear_usuario');
        }
    }
}


    public function editar_usuario($id_usuario)
{
    // Obtener usuario por ID
    $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);

    if (!$usuario) {
        show_error('Usuario no encontrado.', 404);
    }

    // Validar formulario (false = edición)
    $this->validar_usuario(false);

    // Si la validación falla o simplemente se ingresa por primera vez
    if ($this->form_validation->run() === FALSE)
    {
        $data = $this->datos_base('Editar Usuario');
        $data['usuario'] = $usuario;

        // Carga de la vista
        $this->load->view('editar_usuario/header_editar_usuario', $data);
        $this->load->view('editar_usuario/body_editar_usuario', $data);
        $this->load->view('editar_usuario/footer_editar_usuario', $data);
    }
    else
    {
        // Datos a actualizar
        $usuario_data = [
            'nombre'          => $this->input->post('nombre'),
            'apellido'        => $this->input->post('apellido'),
            'nombre_usuario'  => $this->input->post('email')
        ];

        // Si cambia la contraseña
        if ($this->input->post('password')) {
            $usuario_data['password'] = password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            );
        }

        // Actualizar usuario
        $this->Usuario_modelo->actualizar_usuario($id_usuario, $usuario_data);

        // Mensaje de éxito para mostrar en la vista
        $this->session->set_flashdata('mensaje_exito', ' El usuario se actualizó correctamente.');

        // Redirigir a la misma vista para mostrar mensaje
        redirect('usuario/editar_usuario/'.$id_usuario);
    }
}


  public function eliminar_usuario($id_usuario)
{
    // Obtener usuario
    $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);
    if (!$usuario) {
        show_error('Usuario no encontrado.', 404);
    }

    // Verificar si tiene clientes asociados
    $this->db->where('usuario_id', $id_usuario);
    $clientes = $this->db->get('clientes');

    if ($clientes->num_rows() > 0) {
        // Si tiene clientes, no se puede borrar
        $this->session->set_flashdata('mensaje_error', 
            '❌ No se puede eliminar el usuario porque tiene clientes asociados.');
    } else {
        // No tiene clientes, se puede borrar
        $this->Usuario_modelo->eliminar_usuario($id_usuario);
        $this->session->set_flashdata('mensaje_exito', 
            '✔ Usuario eliminado correctamente.');
    }

    // Redirigir al panel administrador
    redirect('administrador');
}


}
