<?php
ob_start();
include("../conexiondb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Pozo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="../assets/images/pdvsaLogo.png">
</head>
<body>
    <nav class="IndicePagina">
        <img src="../assets/images/PDVSA.png" alt="Pdvsa Logo" class="imagenPDVSA">
    </nav>
    <div class="container-Valvulas"> <br>
    <h2 class="titulo-Seccion">Ingrese Pozo</h2> <br> <br> <br>
    <form action="" method="POST">
    <label for="">Nombre del pozo:</label><br>
    <input type="text" name="nombrePozo" placeholder="Ingresar nombre del Pozo" required class="form-control"> <br> <br>
    <label for="">Ciudad del pozo:</label><br>
    <input type="text" name="ciudadPozo" placeholder="Ingrese la ciudad del pozo" required class="form-control"> <br> <br>
<input type="submit" value="Registrar Pozo" name="botonRegistroPozo" class="btn btn-success"> 
</form>
</div>
<footer class="pie-pagina">
        <p>Copyright © 2023. Fernando Ochoa<br>
        Todos los derechos reservados. </p>

    </footer>
</body>
</html>

<?php
if(isset($_POST['botonRegistroPozo'])) {
    $nombrePozo = $_POST['nombrePozo'];
    $ciudad = $_POST['ciudadPozo'];
            $queryPozo = "INSERT into pozo(nombrePozo, ciudad) values ('$nombrePozo', '$ciudad')";
            $resultadoFinal = mysqli_query($conn,$queryPozo);
            if(!$resultadoFinal) {
                die("Query failed");
            } else {
           header("Location:../index.php");
    }

}
ob_end_flush();
    ?>