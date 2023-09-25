<?php 
$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion de alumnos";

$connection = mysqli_connect ($host,$user,$pass,$datab);

$materia = $_POST["materia"];
$horario = $_POST["horario"];
$curso = $_POST["curso"];

$consulta_insert = "INSERT INTO `materia`(`Nombre`, `Horario`, `curso`) VALUES ('$materia','$horario','$curso')";

$realizar_insert = mysqli_query($connection,$consulta_insert);
header("Location: ../pages/indicadores_subida.php");
?>