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
        if(isset($_POST["actualizarProfesores"]))
        {
          $nombre = $_POST["Nombre_profesor"];
          $apellidos = $_POST["Apellido_profesor"];
          $nacionalidad = $_POST["nacionalidad"];
          $DNI = $_POST["DNI"];
          $CUIL = $_POST["Cuil"];
          $fechanacimiento = $_POST["Fecha de nacimiento"];
          $Edad = $_POST["Edad"];
          $telefono = $_POST["Numero de telefono"];
          $celular = $_POST["Numero de celular"];
          $domicilio = $_POST["Domicilio"];
          $depto = $_POST["Domicilio_depto"];
          $piso = $_POST["Domicilio_piso"];
          $localidad = $_POST["Localidad"];
          $partido = $_POST["Partido"];
          $mail = $_POST["Mail"];
          $mailabc = $_POST["Mail_abc"];
          $titulo = $_POST["Titulo"];
          $legajo = $_POST["Legajo"];
          $fechaingreso = $_POST["Fecha de ingreso"];
          $estado = $_POST["Estado"];
          $Files = $_POST["Files"]; 

          $query = "UPDATE `profesores` set `Nombre_profesor` ='$nombre' , `Apellido_profesor` = '$apellidos', `nacionalidad` = '$nacionalidad', `DNI` = '$DNI', `Cuil` = '$CUIL', `Edad` = '$Edad', `fecha de nacimiento` = '$fechanacimiento', `numero de telefono` = '$telefono', `numero de celular` = '$celular', `Domicilio` = '$domicilio', `Domicilio_piso` = '$piso', `Domicilio_depto` = '$depto', `Localidad` = '$localidad', `Partido` = '$partido', `Mail` = '$mail', `Mail_Abc` = '$mailabc', `Titulo` = '$titulo', `Legajo` = '$legajo', `Fecha de ingreso` = '$fechaingreso',`Files` = '$Files' , `Estado` = '$estado' WHERE `numLegajo` = '$id' ";
          $result = mysqli_query($conn, $query);

          if(!$result)
          {
            die("Consulta fallida".mysqli_error($conn));
          }

          else{
            header('location:../pages/index-tabla-profesores.php?update_msg=Docente Modificado. ');
          }

        }
      ?>
<body>
  <form method="post" action="modificar-docente.php?numLegajo=<?php echo $id; ?>">
    <table border="0" align="center">
      <h2>Datos personales:</h2>



      
        <input type="text" name="Nombre_profesor" placeholder="Nombre" value="<?php echo $row['Nombre_profesor']; ?>" /><br />
        <input type="text" name="Apellido_profesor" placeholder="Apellido" value="<?php echo $row['Apellido_profesor']; ?>" /><br />
        <input type="text" name="nacionalidad" placeholder="Nacionalidad" value="<?php echo $row['nacionalidad']; ?>" /><br />
        <input type="number" name="DNI" placeholder="DNI" value="<?php echo $row['DNI']; ?>" /><br />
        <input type="number" name="Cuil" placeholder="CUIL" value="<?php echo $row['Cuil']; ?>" /><br />
        <input type="number" name="Edad" placeholder="Edad" value="<?php echo $row['Edad']; ?>" /><br />
        <h4>Fecha de nacimiento:</h4>
        <input type="date" name="Fecha_de_nacimiento" value="<?php echo $row['Fecha de nacimiento']; ?>">/><br />
        <h2>Contacto:</h2>
        <input type="tel" name="Numero de telefono" placeholder="Telefono" value="<?php echo $row['Numero de telefono']; ?>" /><br />
        <input type="tel" name="Numero de celular" placeholder="Celular(11 ...)" value="<?php echo $row['Numero de celular']; ?>" /><br />
        <input type="text" name="domicilio" placeholder="Calle, numero" value="<?php echo $row['Domicilio']; ?>" /><br />
        <input type="text" name="domicilio_piso" placeholder="Piso" value="<?php echo $row['Domicilio_piso']; ?>" /><br />
        <input type="text" name="domicilio_depto" placeholder="Departamento" value="<?php echo $row['Domicilio_depto']; ?>" /><br />
        <input type="text" name="localidad" placeholder="localidad" value="<?php echo $row['Localidad']; ?>" /><br />
        <input type="text" name="partido" placeholder="partido" value="<?php echo $row['Partido']; ?>" /><br />
        <input type="email" name="Mail" placeholder="Email personal" value="<?php echo $row['Mail']; ?>" /><br />
        <input type="email" name="Mail_abc" placeholder="Email (abc)" value="<?php echo $row['Mail_abc']; ?>" /><br />
        <h2>Documentos:</h2>
        <input type="text" name="Titulo" placeholder="Titulo" value="<?php echo $row['Titulo']; ?>" /><br />
        <input type="text" name="legajo" placeholder="Legajo" value="<?php echo $row['Legajo']; ?>" /><br />
        <h4>Titulos/DNI/Antecedentes penales/etc:</h4>
        <input type="file" name="files" placeholder="Documentos profesores" value="<?php echo $row['Files']; ?>" /><br />
        <h4>Fecha de ingreso:</h4>
        <input type="date" name="Fecha_de_ingreso" value="<?php echo $row['Fecha de ingreso'];?>" /><br />
        <h4>Actividad:</h4>
        <select name="estado" id="estado">
          <option value="Si">Activo</option>
          <option value="No">No activo</option>
        </select><br>

      <button type="submit" name="actualizarProfesores" value="ok">Actualizar</button>
    </table>
  </form>
  <a href="../pages/index-tabla-profesores.php">Volver</a>
</body>

</html>