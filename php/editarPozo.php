<?php
ob_start();
include("../conexiondb.php");
$id = $_GET['id'];
$query = "SELECT nombrePozo, ciudad from pozo where idPozo=$id";
$resultado = mysqli_query($conn,$query);
$rows = mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pozo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="../assets/images/pdvsaLogo.png">
</head>
<body>
<nav class="IndicePagina">
        <img src="../assets/images/PDVSA.png" alt="Pdvsa Logo" class="imagenPDVSA">
    </nav>
    <div class="container-Valvulas">
    <h1 class="titulo-Seccion">Editar Pozo</h1><br><br>
    <form action="" method="POST">
    <label class="form-label">Nombre actual: <?php echo $rows['nombrePozo'] ?> </label><br>
    <input type="text" placeholder="Ingrese nombre nuevo del pozo" name="nombreFieldPozo" class="form-control"><br><br>
    <label class="form-label">Ciudad actual:  <?php echo $rows['ciudad'] ?> </label><br>
    <input type="text" placeholder="Ingrese nueva ciudad" name="ciudadFieldPozo" class="form-control"><br><br>
    <input type="submit" value="Cambiar Datos" name="botonCambiarDatos" class="btn btn-success">
    </form>
    </div>
    <footer class="pie-pagina">
        <p>Copyright © 2023. Fernando Ochoa<br>
        Todos los derechos reservados. </p>

    </footer>
</body>
</html>
<?php
if(isset($_POST['botonCambiarDatos'])) {
    $nombre = $_POST['nombreFieldPozo'];
    $ciudad = $_POST['ciudadFieldPozo'];
    if(!empty($_POST['nombreFieldPozo'])) {
        $query = "UPDATE pozo set nombrePozo = '$nombre' where idPozo=$id";
        $conexion = mysqli_query($conn,$query);
        if(!$conexion) {
            die("Query failed");
        } 

    }
    if(!empty($_POST['ciudadFieldPozo'])) {
        $query = "UPDATE pozo set ciudad = '$ciudad' where idPozo=$id";
        $conexion = mysqli_query($conn,$query);
        if(!$conexion) {
            die("Query failed");
        } 
    }

   header("Location:../index.php");
}

ob_end_flush();
?>