<?php
include("con_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = trim($_POST['course-name']);
    $course_capacity = trim($_POST['course-capacity']);

    // Crear el nuevo curso
    $sql = "INSERT INTO cursos (nombre, capacidad, inscritos) VALUES ('$course_name', $course_capacity, 0)";
    if ($conn->query($sql) === TRUE) {
        echo "Curso creado exitosamente.";
    } else {
        echo "Error al crear el curso: " . $conn->error;
    }
}

$conn->close();
?>
