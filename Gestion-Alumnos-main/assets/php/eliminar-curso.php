<?php

$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion de alumnos";

$conn = new mysqli($host,$user,$pass,$datab);

if(isset($_GET['ID_curso'])){
    $id = $_GET['ID_curso'];
    $query = "SELECT * from `curso` WHERE `ID_curso` = $id ";
    $result = mysqli_query($conn, $query);
   if(!$result){
     die("query fallida". mysqli_error($conn));
   }else{
     $row = mysqli_fetch_assoc($result);
   }
   
   }

if (!empty($_GET["ID_curso"])) {
    $id = $_GET["ID_curso"];
    $sql=$conn->query("DELETE from curso WHERE ID_curso = $id");
    
}
?>