<?php
include("con_db.php");

$sql = "SELECT id, nombre FROM cursos";
$result = $conn->query($sql);

$cursos = array();
while($row = $result->fetch_assoc()) {
    $cursos[] = $row;
}

$conn->close();
?>
