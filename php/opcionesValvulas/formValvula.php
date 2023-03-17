<?php
ob_start();
include("../../conexiondb.php");
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Valvula</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="shortcut icon" href="../../assets/images/pdvsaLogo.png">
</head>
<body>
<nav class="IndicePagina">
        <a href="../../index.php"><img src="../../assets/images/PDVSA.png" alt="Pdvsa Logo" class="imagenPDVSA"></a>
    </nav> <br> <br>
    <div class="container-Valvulas">
    <h2 class="titulo-Seccion">Ingrese Valvula</h2> <br> <br>
    <form action="" method="POST">
        <label class="form-label">Ingrese valor PSI:</label> <br>
    <input type="text" name="valorPSI" placeholder="Ej: 2.3" required> <br> <br>
<input type="submit" value="Registrar Valvula" name="botonRegistroValvula" class="btn btn-success">
</form>
</div>
<footer class="pie-pagina">
        <p>Copyright © 2023. Fernando Ochoa<br>
        Todos los derechos reservados. </p>

    </footer>
</body>
</html>

<?php
if(isset($_POST['botonRegistroValvula'])) {
    $idPozo = $_GET['id'];
    $valorPSI = $_POST['valorPSI'];
            $queryPozo = "INSERT into registro(valorPSI, Pozo_IDPozo) values ('$valorPSI', $idPozo)";
            $resultadoFinal = mysqli_query($conn,$queryPozo);
            if(!$resultadoFinal) {
                die("Query failed");
            } else
            echo "Se logro el registro exitosamente";
            header("Location:../verValvulas.php?id=$idPozo");
    }

    
ob_end_flush();
    ?>
