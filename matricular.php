<?php
include("con_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $cedula = trim($_POST['cedula']);
    $id_curso = trim($_POST['id_curso']);

    // Verificar la capacidad del curso
    $sql = "SELECT capacidad, inscritos FROM cursos WHERE id = $id_curso";
    $result = $conn->query($sql);
    $curso = $result->fetch_assoc();

    if ($curso['inscritos'] < $curso['capacidad']) {
        // Matricular al estudiante
        $sql = "INSERT INTO estudiantes (nombre, email, cedula) VALUES ('$nombre', '$email', '$cedula')";
        if ($conn->query($sql) === TRUE) {
            $id_estudiante = $conn->insert_id;
            $sql = "UPDATE cursos SET inscritos = inscritos + 1 WHERE id = $id_curso";
            $conn->query($sql);
            echo "¡Te has matriculado correctamente!";
        } else {
            echo "Error al matricularse: " . $conn->error;
        }
    } else {
        // Enlistar al estudiante en lista de espera
        $sql = "INSERT INTO lista_espera2 (id_estudiante, id_curso) VALUES ('$id_estudiante', '$id_curso')";
        if ($conn->query($sql) === TRUE) {
            echo "El curso está lleno. Te has enlistado en la lista de espera.";
        } else {
            echo "Error al enlistarse: " . $conn->error;
        }
    }
}

$conn->close();
?>
