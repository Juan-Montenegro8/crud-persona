<?php
// Incluir la conexión
include 'conexion.php';

// Incluir el controlador
include 'Controller/DepartamentoController.php';

// Instanciar el controlador
$controller = new DepartamentoController($conn);

// Lógica para agregar, editar o eliminar un departamento
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_id']) && !empty($_POST['edit_id'])) {
        // Actualizar departamento
        $controller->actualizarDepartamento($_POST['edit_id'], $_POST['departamento']);
    } elseif (isset($_POST['departamento']) && empty($_POST['edit_id'])) {
        // Agregar nuevo departamento
        $controller->agregarDepartamento($_POST['departamento']);
    }
}

if (isset($_GET['delete_id'])) {
    // Eliminar departamento
    $controller->eliminarDepartamento($_GET['delete_id']);
}

// Mostrar los departamentos
$departamentos = $controller->mostrarDepartamentos();

// Incluir la vista
include 'View/departamentoView.php';
?>
