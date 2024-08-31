<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AlumnosController extends CI_Controller
{
    /**
     * Controlador Alumnos
     * Descripción: CRUD para la gestión de alumnos
     */
    public function __construct()
    {
        parent::__construct();

        // Cargar el modelo de alumnos
        $this->load->model('Model_alumnos');

        // Cargar librerías y helpers necesarios
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
    }

    /**
     * Carga la vista principal con la lista de alumnos
     */
    public function index()
    {
        $this->data['resultados'] = $this->Model_alumnos->getAlumnos();
        $this->data['titulo'] = "Mantenimiento de Alumnos";
        $this->data['vista'] = "alumno/index";
        $this->load->view('layout/partialView', $this->data);
    }

    /**
     * Carga la vista del formulario para crear o editar un alumno
     */
    public function form($alumno = "")
    {
        if ($alumno) {
            // Modo edición
            $this->data['titulo'] = "Editar Alumno";
            $this->data['accion'] = site_url('AlumnosController/update/' . $alumno);
            $this->data['alumno'] = $this->Model_alumnos->getAlumnoById($alumno);
        } else {
            // Modo creación
            $this->data['titulo'] = "Nuevo Alumno";
            $this->data['accion'] = site_url('AlumnosController/create');
            $this->data['alumno'] = null;
        }
        $this->data['vista'] = "alumno/form";
        $this->load->view('layout/partialView', $this->data);
    }

    /**
     * Crear un nuevo alumno
     */
    public function create()
    {
        if ($_POST) {
            // Definir reglas de validación
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required');
            $this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email');
            $this->form_validation->set_rules('direccion', 'Dirección', 'required');
            $this->form_validation->set_rules('movil', 'Teléfono', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Validación fallida
                $this->session->set_flashdata('eerror', validation_errors());
                redirect('AlumnosController/form/');
            } else {
                // Datos validados, proceder a crear
                $datos = array(
                    'nombre' => $this->input->post('nombre'),
                    'apellido' => $this->input->post('apellido'),
                    'direccion' => $this->input->post('direccion'),
                    'movil' => $this->input->post('movil'),
                    'email' => $this->input->post('email'),
                    'inactivo' => $this->input->post('inactivo'),
                    'user' => $this->session->userdata('user_id') // Asegúrate de tener el ID del usuario en la sesión
                );

                if ($this->Model_alumnos->create($datos)) {
                    $this->session->set_flashdata('eok', 'Registro creado satisfactoriamente');
                    redirect('AlumnosController');
                } else {
                    $this->session->set_flashdata('eerror', 'Ocurrió un error al intentar crear el registro');
                    redirect('AlumnosController/form/');
                }
            }
        } else {
            // Acceso no permitido
            $this->session->set_flashdata('eerror', 'Error al guardar el registro, contacte al administrador');
            redirect('AlumnosController');
        }
    }

    /**
     * Actualizar un alumno existente
     */
    public function update($id)
    {
        if ($_POST) {
            // Definir reglas de validación
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required');
            $this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email');
            $this->form_validation->set_rules('direccion', 'Dirección', 'required');
            $this->form_validation->set_rules('movil', 'Teléfono', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Validación fallida
                $this->session->set_flashdata('eerror', validation_errors());
                redirect('AlumnosController/form/' . $id);
            } else {
                // Datos validados, proceder a actualizar
                $datos = array(
                    'nombre' => $this->input->post('nombre'),
                    'apellido' => $this->input->post('apellido'),
                    'direccion' => $this->input->post('direccion'),
                    'movil' => $this->input->post('movil'),
                    'email' => $this->input->post('email'),
                    'inactivo' => $this->input->post('inactivo'),
                    'user' => $this->session->userdata('user_id') // Asegúrate de tener el ID del usuario en la sesión
                );

                if ($this->Model_alumnos->update($id, $datos)) {
                    $this->session->set_flashdata('eok', 'Registro actualizado satisfactoriamente');
                    redirect('AlumnosController');
                } else {
                    $this->session->set_flashdata('eerror', 'Ocurrió un error al intentar actualizar el registro');
                    redirect('AlumnosController/form/' . $id);
                }
            }
        } else {
            // Acceso no permitido
            $this->session->set_flashdata('eerror', 'Error al actualizar el registro, contacte al administrador');
            redirect('AlumnosController');
        }
    }

    /**
     * Eliminar un alumno
     */
    public function delete($id)
    {
        if ($this->Model_alumnos->delete($id)) {
            $this->session->set_flashdata('eok', 'Registro eliminado satisfactoriamente');
        } else {
            $this->session->set_flashdata('eerror', 'Ocurrió un error al intentar eliminar el registro');
        }
        redirect('AlumnosController');
    }
}
