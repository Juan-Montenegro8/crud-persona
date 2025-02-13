<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Departamentos</title>
        <style>
            table {
                width: 50%;
                margin: 20px auto;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 10px;
                text-align: center;
            }

            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.4);
            }
            .modal-content {
                background-color: #fefefe;
                margin: 15% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 40%;
            }
            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align: center;">Lista de Departamentos</h2>

        <?php if ($departamentos->num_rows > 0): ?>
            <table>
                <tr><th>ID Departamento</th><th>Departamento</th><th>Eliminar/Editar</th></tr>
                <?php while($row = $departamentos->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["idDepartamento"]; ?></td>
                        <td><?php echo $row["departamento"]; ?></td>
                        <td>
                            <a href="?delete_id=<?php echo $row["idDepartamento"]; ?>"><button>Eliminar</button></a>
                            <button class="edit-btn" onclick="openModal(<?php echo $row["idDepartamento"]; ?>, '<?php echo $row["departamento"]; ?>')">Editar</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron departamentos.</p>
        <?php endif; ?>

        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h3>Modificar Departamento</h3>
                <form action="" method="POST">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <label for="departamento">Nuevo Nombre del Departamento:</label>
                    <input type="text" id="departamento" name="departamento" required>
                    <button type="submit">Actualizar Departamento</button>
                </form>
            </div>
        </div>

        <script>
            function openModal(id, departamento) {
                document.getElementById('edit_id').value = id;
                document.getElementById('departamento').value = departamento;
                document.getElementById('editModal').style.display = "block";
            }

            function closeModal() {
                document.getElementById('editModal').style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == document.getElementById('editModal')) {
                    closeModal();
                }
            }
        </script>

        <h3>Agregar un Nuevo Departamento</h3>
        <form action="" method="POST">
            <label for="departamento">Nombre del Departamento:</label>
            <input type="text" id="departamento" name="departamento" required>
            <button type="submit">Agregar Departamento</button>
        </form>
    </body>
</html>
