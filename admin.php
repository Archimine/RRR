<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Cursos</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>
    <h1>Administración de Cursos</h1>

    <h2>Lista de Espera</h2>
    <div id="lista-espera">
        <?php
        // Incluir el archivo para obtener la lista de espera
        include("get_lista_espera.php");

        // Asegurarse de que $lista_espera esté definido y sea un array
        if (isset($lista_espera2) && is_array($lista_espera2)) {
            foreach ($lista_espera2 as $espera) {
                // Verificar la existencia de las claves en el array $espera
                $nombre = $espera['nombre'] ?? 'No disponible';
                $email = $espera['email'] ?? 'No disponible';
                $cedula = $espera['cedula'] ?? 'No disponible';
                $id_curso = $espera['id_curso'] ?? 'No disponible';

                echo "<p>{$nombre} - {$email} - {$cedula} (Curso ID: {$id_curso})</p>";
            }
        } else {
            echo "<p>No hay datos disponibles.</p>";
        }
        ?>
    </div>

    <h2>Crear Nuevo Curso</h2>
    <form id="create-course-form" method="post" action="crear_curso.php">
        <label for="course-name">Nombre del Curso:</label>
        <input type="text" id="course-name" name="course-name" required>
        <label for="course-capacity">Capacidad del Curso:</label>
        <input type="number" id="course-capacity" name="course-capacity" required>
        <button type="submit">Crear Curso</button>
    </form>

    <h2>Matricular Estudiantes de la Lista de Espera</h2>
    <form id="enroll-waitlist-form" method="post" action="matricular_lista_espera.php">
        <label for="curso-id">ID del Curso:</label>
        <input type="number" id="curso-id" name="curso-id" required>
        <button type="submit">Matricular Estudiantes</button>
    </form>

    <script src="admin.js"></script>
</body>
</html>
