<?php
include("con_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso_id = trim($_POST['curso-id']);

    // Obtener los estudiantes en la lista de espera
    $sql = "SELECT * FROM lista_espera2 WHERE id_curso = $curso_id";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $id_estudiante = $row['id_estudiante'];

        // Matricular al estudiante en el curso
        $sql = "INSERT INTO estudiantes_cursos (id_estudiante, id_curso) VALUES ('$id_estudiante', '$curso_id')";
        if ($conn->query($sql) === TRUE) {
            // Actualizar el curso con el nuevo inscrito
            $sql = "UPDATE cursos SET inscritos = inscritos + 1 WHERE id = $curso_id";
            $conn->query($sql);

            // Eliminar el estudiante de la lista de espera
            $sql = "DELETE FROM lista_espera2 WHERE id = " . $row['id'];
            $conn->query($sql);
        }
    }

    echo "Estudiantes de la lista de espera han sido matriculados en el curso.";
}

$conn->close();
?>
