<?php
include("con_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $cedula = trim($_POST['cedula']);
    $curso_id = trim($_POST['id_curso']);

    // Insertar en la lista de espera
    $sql = "INSERT INTO lista_espera2 (nombre, email, cedula, curso_id) VALUES ('$nombre', '$email', '$cedula', $curso_id)";
    if ($conn->query($sql) === TRUE) {
        echo "Te has enlistado en la lista de espera.";
    } else {
        echo "Error al enlistarse: " . $conn->error;
    }
}

$conn->close();
?>
