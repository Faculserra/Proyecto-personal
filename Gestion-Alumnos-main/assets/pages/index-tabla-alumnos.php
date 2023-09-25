<?php


use function PHPSTORM_META\sql_injection_subst;


$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion de alumnos";


$conexion=mysqli_connect($host,$user,$pass,$datab)or die("Problemas al conectar");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <link rel="stylesheet" href="../css/style.css" />


    <title>Tabla de Alumnos</title>
  </head>
  <body>
    <table border="1">
      <tr>
     
        <td>
        Nombres
        </td>


        <td>
          Apellido
        </td>
        <td>
          DNI
        </td>
        <td>
          Año de entrada
        </td>
      </tr>


      <?php
        $sql="SELECT * from `legajo_alumno`";
        $result=mysqli_query($conexion,$sql);


        while($mostrar=mysqli_fetch_array($result)){?>
          <tr>
            <td><?php echo $mostrar['Nombre_alumno'] ?></td>
            <td><?php echo $mostrar['Apellido_alumno'] ?></td>
            <td><?php echo $mostrar['DNI'] ?></td>
            <td><?php echo $mostrar['Anio_entrada'] ?></td>
            <td><a href="../php/modificar-alumno.php?Legajo=<?php echo $mostrar["Legajo"]; ?>" class="button-medium-update">Actulizar</a></td>
        <td><a href="index-tabla-alumnos.php?Legajo=<?php echo $mostrar["Legajo"]; ?>" class="button-medium-delete">Eliminar</a></td>
          </tr>
          <?php } ?>
       
    </table>
    <a href="../../index.html">Volver</a>
  </body>
</html>