<?php
ob_start();
include("../../conexiondb.php");
$id = $_GET['id'];
$query = "SELECT fechayhora, valorPSI,Pozo_IdPozo from registro where idregistro=$id";
$resultado = mysqli_query($conn,$query);
$rows = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Valvula</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="shortcut icon" href="../../assets/images/pdvsaLogo.png">
</head>
<body>
<nav class="IndicePagina">
        <a href="../../index.php"><img src="../../assets/images/PDVSA.png" alt="Pdvsa Logo" class="imagenPDVSA"></a>
    </nav> <br> <br>
    <div class="container-Valvulas">
    <h2 class="titulo-Seccion">Editar Valvula</h1> <br> <br>
    <form action="" method="POST">
    <label class="form-label">Valor PSI: <?php echo $rows['valorPSI'] ?> </label><br>
    <input type="text" placeholder="Ingrese nombre nuevo del pozo" name="nombreFieldValvula"><br><br>
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
    $idPozo = $rows['Pozo_IdPozo'];
    $valorPSI = $_POST['nombreFieldValvula'];
    if(!empty($_POST['nombreFieldValvula'])) {
        $query = "UPDATE registro set valorPSI = '$valorPSI' where idregistro=$id";
        $conexion = mysqli_query($conn,$query);
        if(!$conexion) {
            die("Query failed");
        } else
        echo "Se logro el registro exitosamente";

    }

    header("Location:../verValvulas.php?id=$id");
}

ob_end_flush();
?>