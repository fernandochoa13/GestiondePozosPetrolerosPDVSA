<?php
ob_start();
include("../../conexiondb.php");
$id = $_GET['id'];
$query = "SELECT fechayhora,valorPSI,Pozo_IdPozo from registro where idregistro=$id";
$resultado = mysqli_query($conn,$query);
$rows = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Valvula</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="shortcut icon" href="../../assets/images/pdvsaLogo.png">
</head>
<body>
<nav class="IndicePagina">
        <img src="../../assets/images/PDVSA.png" alt="Pdvsa Logo" class="imagenPDVSA">
    </nav>
    <div class="container-Valvulas"> <br>
    <h1 class="titulo-Seccion">Borrar Valvula</h1><br><br>
    <form action="" method="POST">
    <label class="form-label"> ¿Está seguro que desea borrar la valvula con los siguientes datos? </label><br><br>
    <label class="form-label"> Fecha y hora de registro: <?php echo $rows['fechayhora'] ?> </label> <br>
    <label class="form-label"> Valor PSI: <?php echo $rows['valorPSI'] ?> </label> <br> <br>
    <input type="submit" value="Borrar Definitivamente" name="botonBorrar" class="btn btn-danger">
    <input type="submit" value="Regresar al inicio" name="botonRegresar" class="btn btn-success">
    </form>
</div>
<footer class="pie-pagina">
        <p>Copyright © 2023. Fernando Ochoa<br>
        Todos los derechos reservados. </p>

    </footer>
</body>
</html>

<?php 
if(isset($_POST['botonBorrar'])) {
    $idPozo = $rows['Pozo_IdPozo'];
    $queryBorrar = "DELETE from registro where idregistro=$id";
    $resultado = mysqli_query($conn,$queryBorrar);
    header("Location:../verValvulas.php?id=$idPozo");
}

if(isset($_POST['botonRegresar'])) {
    $idPozo = $rows['Pozo_IdPozo'];
    header("Location:../verValvulas.php?id=$idPozo");
}
ob_end_flush();
?>