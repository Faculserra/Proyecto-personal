<?php

use function PHPSTORM_META\elementType;

$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion de alumnos";

$conn = new mysqli($host, $user, $pass, $datab);

if (!empty($_GET["Id"])) {
    $id = $_GET["Id"];
    $stmt = $conn->prepare("DELETE FROM materia WHERE Id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Materia eliminada correctamente";
    } else {
        echo "Error. No se puedo eliminar la materia";
    }
} else {
    echo "Id de materia no encontrado";
}
$conn->close();
