<?php

class DepartamentoModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Obtener todos los departamentos
    public function getDepartamentos() {
        $sql = "SELECT * FROM departamento";
        $result = $this->conn->query($sql);
        return $result;
    }

    // Agregar un nuevo departamento
    public function agregarDepartamento($departamento) {
        $sql = $this->conn->prepare("INSERT INTO departamento (departamento) VALUES (?)");
        $sql->bind_param("s", $departamento);
        return $sql->execute();
    }

    // Actualizar un departamento
    public function actualizarDepartamento($id, $departamento) {
        $sql = $this->conn->prepare("UPDATE departamento SET departamento = ? WHERE idDepartamento = ?");
        $sql->bind_param("si", $departamento, $id);
        return $sql->execute();
    }

    // Eliminar un departamento
    public function eliminarDepartamento($id) {
        $sql = $this->conn->prepare("DELETE FROM departamento WHERE idDepartamento = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
}
?>
