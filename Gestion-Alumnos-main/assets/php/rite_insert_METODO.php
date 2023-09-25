<?php
$user = "root";
$pass = "";
$host = "localhost";
$dbname = "gestion de alumnos";

$connection = mysqli_connect($host, $user, $pass, $dbname);

if (!$connection) {
    die("La conexión falló: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profesor = $_POST["profesor"];
    $alumno = $_POST["alumno"];
    $materia = $_POST["materia"];
    $instancia = $_POST["instancias"];
    $fecha = $_POST["fecha"];

    $indicadores = array();
    $trayectorias = array();
    for ($i = 1; $i <= 12; $i++) {
        $indicadores[$i] = $_POST["ind_" . $i];
        $trayectorias[$i] = $_POST["trayect_" . $i];
    }

    // Realizar la inserción en la base de datos
    $sql = "INSERT INTO notas (Materia, Profesor, Alumno, Instancia, Fecha_nota";

    for ($i = 1; $i <= 12; $i++) {
        $sql .= ", nota_ind$i, nota_trayect_$i";
    }
    
    $sql .= ") VALUES ('$materia', '$profesor', '$alumno', '$instancia', '$fecha'";
    
    for ($i = 1; $i <= 12; $i++) {
        $sql .= ", '{$indicadores[$i]}', '{$trayectorias[$i]}'";
    }
    
    $sql .= ")";
    
    if (mysqli_query($connection, $sql)) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar los datos: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
