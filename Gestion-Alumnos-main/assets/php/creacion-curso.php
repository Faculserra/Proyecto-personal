<?php
$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion_de_alumnos"; // Nombre de la base de datos

$conn = new mysqli($host, $user, $pass, $datab);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si se ha enviado un parámetro (por ejemplo, un ID) para borrar un registro
if (isset($_POST["id_a_borrar"])) {
    $id_a_borrar = $_POST["id_a_borrar"];

    // Preparar una consulta SQL DELETE para eliminar un registro de la tabla
    $stmt = $conn->prepare("DELETE FROM `curso` WHERE `ID_curso` = ?");
    $stmt->bind_param("s", $id_a_borrar);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Registro eliminado exitosamente";
    } else {
        echo "Error al eliminar el registro: " . $stmt->error;
    }

    // Cerrar la consulta
    $stmt->close();
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
