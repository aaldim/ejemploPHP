<?php
class Model_alumnos extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Obtiene los registros de alumnos
     * @return [type] [arreglo de datos]
     */



    function getAlumnos()
    {
        $sql = "SELECT * FROM alumnos";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function create($datos)
	{
		return $this->db->insert('alumnos', $datos);
	}

    // Obtener un alumno por su ID
    public function getAlumnoById($id)
    {
        $query = $this->db->get_where($this->table, array('alumno' => $id));
        return $query->row();
    }

    // Actualizar un alumno existente
    public function update($id, $datos)
    {
        $this->db->where('alumno', $id);
        return $this->db->update($this->table, $datos);
    }

    // Eliminar un alumno
    public function delete($id)
    {
        $this->db->where('alumno', $id);
        return $this->db->delete($this->table);
    }
}
