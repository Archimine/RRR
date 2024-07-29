<?php
include("con_db.php");

$sql = "
    SELECT 
        e.nombre, 
        e.email, 
        e.cedula, 
        l.id_curso 
    FROM 
        lista_espera2 l
    JOIN 
        estudiantes e ON l.id_estudiante = e.id
";

$result = $conn->query($sql);

$lista_espera2 = array();
while ($row = $result->fetch_assoc()) {
    $lista_espera2[] = $row;
}

$conn->close();
?>
