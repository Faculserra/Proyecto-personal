<?php

use function PHPSTORM_META\sql_injection_subst;

$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion de alumnos";

  $conexion=mysqli_connect($host,$user,$pass,$datab)
  or die("Problemas al conectar");
  $sql = "SELECT profesores.Nombre_profesor,materia.Id, profesores.Apellido_profesor, materia.Nombre, materia.Horario, curso.Nombre_Curso, curso.Anio FROM profesor_materia INNER JOIN materia ON profesor_materia.Materia = materia.Id INNER JOIN profesores ON profesor_materia.Profesor = profesores.numLegajo INNER JOIN curso ON materia.curso = curso.ID_curso;";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Tabla de materias</title>
  </head>
  <body>
    <table border="1">
        <tr>
            <td>Nombre de la materiaa</td>
            <td>Horario</td>
            <td>Curso</td>
            <td>Profe a cargo</td>
        </tr>
        <?php 
        $result=mysqli_query($conexion,$sql);
        while($mostrar=mysqli_fetch_array($result)){
        ?>
        <tr>
            
            <td><?php echo $mostrar['Nombre'] ?></td>
            <td><?php echo $mostrar['Horario'] ?></td>
            <td><?php echo $mostrar['Nombre_Curso'].' - '.$mostrar['Anio'] ?></td>
            <td><?php echo $mostrar['Nombre_profesor'] . '  ' . $mostrar['Apellido_profesor']?></td>
            
            <td><a href="../php/modificar-materia.php?Id=<?php echo $mostrar["Id"]; ?> "class="button-medium-update">Actulizar</a></td>
            <td><a href="../php/eliminar-materia.php?Id=<?php echo $mostrar["Id"]; ?>" class="button-medium-delete">Eliminar</a></td>        
            <?php 
        }
      ?> 
    </table>
    <a href="../../index.html">Volver</a>
  </body>
</html>