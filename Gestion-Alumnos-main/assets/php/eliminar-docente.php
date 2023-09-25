<?php

$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion de alumnos";

$conn = new mysqli($host,$user,$pass,$datab);

if(isset($_GET['numLegajo'])){
    $id = $_GET['numLegajo'];
    $query = "SELECT * from `profesores` WHERE `numLegajo` = $id ";
    $result = mysqli_query($conn, $query);
   if(!$result){
     die("query fallida". mysqli_error($conn));
   }else{
     $row = mysqli_fetch_assoc($result);
   }
   
   }

if (!empty($_GET["numLegajo"])) {
    $id = $_GET["numLegajo"];
    $sql=$conn->query("DELETE from profesores WHERE numLegajo = $id");
    
}
?>