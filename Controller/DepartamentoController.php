<?php
// Incluir el modelo
include 'Model/DepartamentoModel.php';

class DepartamentoController {
    private $model;

    public function __construct($conn) {
        $this->model = new DepartamentoModel($conn);
    }

    // Función para mostrar todos los departamentos
    public function mostrarDepartamentos() {
        return $this->model->getDepartamentos();
    }

    // Función para agregar un nuevo departamento
    public function agregarDepartamento($departamento) {
        return $this->model->agregarDepartamento($departamento);
    }

    // Función para actualizar un departamento
    public function actualizarDepartamento($id, $departamento) {
        return $this->model->actualizarDepartamento($id, $departamento);
    }

    // Función para eliminar un departamento
    public function eliminarDepartamento($id) {
        return $this->model->eliminarDepartamento($id);
    }
}
?>