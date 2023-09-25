<?php

$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion de alumnos";

$conn = new mysqli($host, $user, $pass, $datab);

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * from `materia`,'curso','profesores' WHERE `id` = $id ";
  $sql = "SELECT profesores.Nombre_profesor,materia.Id, profesores.Apellido_profesor, materia.Nombre, materia.Horario, curso.Nombre_Curso, curso.Anio FROM profesor_materia INNER JOIN materia ON profesor_materia.Materia = materia.Id INNER JOIN profesores ON profesor_materia.Profesor = profesores.numLegajo INNER JOIN curso ON materia.curso = curso.ID_curso;";

  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("query fallida" . mysqli_error($conn));
  } else {
    $row = mysqli_fetch_assoc($result);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css" />
  <title>Actualizar Datos</title>
</head>

<?php
if (isset($_POST["actualizarMateria"])) {
  $nombre = $_POST["Nombre"];
  $horario = $_POST["Horario"];
  $nombrecursoyanio = $_POST["Nombre_Curso"] . ["Anio"];
  $nombreyapellidoprofe = $_POST["Nombre_profesor"] . ["Apellido_profesor"];




  $query = "UPDATE `materia`,'curso','profesores' set `Nombre` ='$nombre' , `Horario` = '$horario', `Nombre_Curso` = '$nombrecursoyanio', `Anio` = '$nombrecursoyanio', `Nombre_profesor` = '$nombreyapellidoprofe', `Apellido_profesor` = '$nombreyapellidoprofe' WHERE `Id` = '$id' ";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Consulta fallida" . mysqli_error($conn));
  } else {
    header('location:../pages/index-tabla-materias.php?update_msg=Materia Modificado. ');
  }
}

?>

<body>
  <?php $id = $_GET["Id"]; ?>
  <form method="post" action="modificar-materia.php?Id=<?php echo  $Id; ?>">
    <table border="0" align="center">
      <h2>Datos personales:</h2>




      <input type="text" name="Nombre" placeholder="nombre materia" value="<?php echo isset($row['Nombre']) ? $row['Nombre'] : ''; ?>" /><br />
      <input type="text" name="Horario" placeholder="horario materia" value="<?php echo isset($row['Horario']) ? $row['Horario'] : ''; ?>" /><br />
      <input type="text" name="Nombre_Curso" placeholder="Curso" value="<?php echo isset($row['Nombre_Curso']) ? $row['Nombre_Curso'] : ''; ?>" /><br />
      <input type="text" name="Anio" placeholder="Año" value="<?php echo isset($row['Anio']) ? $row['Anio'] : ''; ?>" /><br />
      <input type="text" name="Nombre_profesor" placeholder="Nombre del profesor" value="<?php echo isset($row['Nombre_profesor']) ? $row['Nombre_profesor'] : ''; ?>" /><br />
      <input type="text" name="Apellido_profesor" placeholder="Apellido del profesor" value="<?php echo isset($row['Apellido_profesor']) ? $row['Apellido_profesor'] : ''; ?>" /><br />

      <button type="submit" name="actualizarMateria" value="ok">Actualizar</button>
    </table>
  </form>
  <a href="../pages/index-tabla-materias.php">Volver</a>
</body>

</html>