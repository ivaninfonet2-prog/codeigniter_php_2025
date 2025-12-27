
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Espectaculos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['url', 'form']);
        $this->load->model('Espectaculo_modelo');
    }

    // Genera aviso según fecha/hora y disponibilidad
  
    private function generar_aviso($e)
    {
        $ahora = new DateTime();
       
        $evento = new DateTime("{$e['fecha']} {$e['hora']}");

        if ($evento < $ahora) 
        {
            return 'Este espectáculo ya ha pasado.';
        }

        $diff = $ahora->diff($evento);
      
        $horas = $diff->days * 24 + $diff->h;

        if ($horas <= 48 && $e['disponibles'] > 0)
        {
            return '¡Queda poco tiempo!';
        } 
        else
        {
            return 'Todavía falta tiempo.';
        }
    }

    // lista principal de espectaculos

    public function index()
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        foreach ($espectaculos as &$e) 
        {
            if ($e['fecha'] >= date('Y-m-d') && $e['disponibles'] > 0) 
            {
                $e['detalles_habilitados'] = true;
            } 
            else 
            {
                $e['detalles_habilitados'] = false;
            }

            $e['aviso'] = $this->generar_aviso($e);
        }

        $data = 
        [
            'titulo'        => "Cartelera de Espectáculos",
            'fondo'         => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos'  => $espectaculos
        ];

        $this->load->view('principal/header_principal', $data);
        $this->load->view('principal/body_principal', $data);
        $this->load->view('principal/footer_principal', $data);
    }

    // lista de espectculos del usuario

    public function usuario_espectaculos()
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        foreach ($espectaculos as &$e) 
        {
            if ($e['fecha'] >= date('Y-m-d') && $e['disponibles'] > 0) 
            {
                $e['detalles_habilitados'] = true;
            } 
            else 
            {
                $e['detalles_habilitados'] = false;
            }

            $e['aviso'] = $this->generar_aviso($e);
        }

        $data = 
        [
            'titulo'        => "Cartelera de Espectáculos",
            'fondo'         => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos'  => $espectaculos
        ];

        $this->load->view('usuario_espectaculos/header_usuario_espectaculos', $data);
        $this->load->view('usuario_espectaculos/body_usuario_espectaculos', $data);
        $this->load->view('usuario_espectaculos/footer_usuario_espectaculos', $data);
    }

    // listas de espectaculos del administrador

    /* ================================
       LISTADO ADMINISTRADOR
    ================================ */
    public function administrador_espectaculos()
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        foreach ($espectaculos as &$e)
        {
            $e['aviso'] = $this->generar_aviso($e);
        }

        $data =
        [
            'titulo'       => 'Cartelera de Espectáculos',
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $espectaculos
        ];

        $this->load->view('administrador_espectaculos/header_administrador_espectaculos', $data);
        $this->load->view('administrador_espectaculos/body_administrador_espectaculos', $data);
        $this->load->view('administrador_espectaculos/footer_administrador_espectaculos');
    }

    // espectaculo sin loguear

    public function espectaculo_sin_loguear($id)
    {
        // Obtener espectáculo
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if (!$espectaculo) 
        {
            show_404();
        }

        // Datos de la vista
        $data = 
        [
            'titulo'      => 'Ver espectáculo',
            'fondo'       => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        $this->load->view('espectaculo_sin_loguear/header_espectaculo_sin_loguear', $data);
        $this->load->view('espectaculo_sin_loguear/body_espectaculo_sin_loguear', $data);
        $this->load->view('espectaculo_sin_loguear/footer_espectaculo_sin_loguear', $data);
    }

    // espectaculo logueado

    public function espectaculo_logueado($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if ( ! $espectaculo)
        {
            show_404();
        }

        // Datos propios de esta vista
        $data = 
        [
            'titulo'      => 'Ver espectáculo',
            'fondo'       => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        $this->load->view('espectaculo_logueado/header_espectaculo_logueado', $data);
        $this->load->view('espectaculo_logueado/body_espectaculo_logueado', $data);
        $this->load->view('espectaculo_logueado/footer_espectaculo_logueado', $data);
    }

    // reglas de validacion
    
    private function reglas_formulario()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
        $this->form_validation->set_rules('fecha', 'Fecha', 'required');
        $this->form_validation->set_rules('hora', 'Hora', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
        $this->form_validation->set_rules('disponibles', 'Disponibles', 'required|integer');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');
    }

    // crear espectaculo
    public function crear_espectaculo()
    {
        $data = 
        [
            'titulo' => 'Crear espectáculo',
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg')
        ];

        if ($this->input->method() === 'post') 
        {
            // Reutiliza la función de reglas
            $this->reglas_formulario();

            if ($this->form_validation->run()) 
            {
                $imagen = $this->subir_imagen();

                $nuevo = 
                [
                    'nombre'      => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'fecha'       => $this->input->post('fecha'),
                    'hora'        => $this->input->post('hora'),
                    'precio'      => $this->input->post('precio'),
                    'disponibles' => $this->input->post('disponibles'),
                    'direccion'   => $this->input->post('direccion'),
                    'imagen'      => $imagen
                ];

                $this->Espectaculo_modelo->agregar_espectaculo($nuevo);

                $this->session->set_flashdata('success', 'El espectáculo fue creado exitosamente.');
            
                redirect('administrador');
            }
        }

        $this->load->view('crear_espectaculo/header_crear_espectaculo', $data);
        $this->load->view('crear_espectaculo/body_crear_espectaculo', $data);
        $this->load->view('crear_espectaculo/footer_crear_espectaculo', $data);
    }

    /* ================================
       EDITAR
    ================================ */
    public function editar_espectaculo($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if (!$espectaculo) show_404();

        $data =
        [
            'titulo'      => 'Editar espectáculo',
            'fondo'       => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        if ($this->input->method() === 'post')
        {
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('fecha', 'Fecha', 'required');
            $this->form_validation->set_rules('hora', 'Hora', 'required');
            $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
            $this->form_validation->set_rules('disponibles', 'Disponibles', 'required|integer');

            if ($this->form_validation->run())
            {
                $actualizado =
                [
                    'nombre'      => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'fecha'       => $this->input->post('fecha'),
                    'hora'        => $this->input->post('hora'),
                    'precio'      => $this->input->post('precio'),
                    'disponibles' => $this->input->post('disponibles'),
                    'direccion'   => $this->input->post('direccion')
                ];

                $this->Espectaculo_modelo->actualizar_espectaculo($id, $actualizado);
                $this->session->set_flashdata('mensaje', 'Espectáculo actualizado correctamente.');

                redirect('espectaculos/administrador_espectaculos');
            }
        }

        $this->load->view('editar_espectaculo/header_editar', $data);
        $this->load->view('editar_espectaculo/body_editar', $data);
        $this->load->view('editar_espectaculo/footer_editar');
    }

    // ELIMINAR ESPECTÁCULO (ADMINISTRADOR)

    public function eliminar_espectaculo($id)
    {
        // Obtener espectáculo
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if (!$espectaculo)
        {
            show_404();
        }

        // Eliminar imagen asociada si existe
        if (!empty($espectaculo['imagen']))
        {
            $ruta_imagen = FCPATH . 'activos/imagenes/' . $espectaculo['imagen'];

            if (file_exists($ruta_imagen))
            {
                unlink($ruta_imagen);
            }
        }

        //  LLAMADA CORRECTA AL MODELO
        $this->Espectaculo_modelo->eliminar_espectaculo_completo($id);

        // Mensaje flash
        $this->session->set_flashdata(
            'mensaje',
            'El espectáculo fue eliminado correctamente.'
        );

        // Redirección
        redirect('espectaculos/administrador_espectaculos');
    }
}    
?>
