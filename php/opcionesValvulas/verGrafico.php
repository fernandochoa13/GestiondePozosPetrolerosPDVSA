<?php
ob_start();
     include("../../conexiondb.php");

    $id = $_GET['id'];

    $peticion = "SELECT * FROM registro WHERE Pozo_IdPozo = '$id'";
    $resultado = mysqli_query($conn,$peticion);
    $fecha = [];
    $valoresPSI = [];
    
    if(mysqli_num_rows($resultado) > 0) {
        while($array = mysqli_fetch_array($resultado)) {
           array_push($fecha, $array['fechayhora']);
           array_push($valoresPSI, $array['valorPSI']);
        }
    } else {

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="shortcut icon" href="../../assets/images/pdvsaLogo.png">
</head>
<body>
<nav class="IndicePagina">
        <a href="../../index.php"><img src="../../assets/images/PDVSA.png" alt="Pdvsa Logo" class="imagenPDVSA"></a>
    </nav> <br><br>
    <div class="container-Valvulas">
    <h1 class="titulo-Seccion">Gráfico correspondiente al Pozo </h1> <br><br>
    </div>
    <div class="container" style="text-align:center;width:40%;border:solid 1px black">
    <canvas id = "lineChart" height = "400" width = "400"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const CHART = document.getElementById("lineChart");
        console.log(CHART);
        let lineChart = new Chart(CHART, {
            type: "line",
            data: {
                labels: [<?php echo '"'.implode('","',  $fecha ).'"' ?>],
                datasets: [{
                    label: 'Valor PSI:',
                    data: [<?php echo '"'.implode('","',  $valoresPSI ).'"' ?>],
                    fill: false,
                    borderColor: 'rgb(139,0,0)',
                    tension: 0.1,
                    backgroundColor: 'rgb(139,0,0,1)',
                }]
        }
    })
    </script>
    </div> <br>

    <div class="container-Valvulas"> 
    <form action="" method="POST">
    <input type="submit" name="volveraValvulas" value="Regresar a Valvulas" class="btn btn-success">
    </div>
    </form> <br> <br> <br> <br>  <br> <br> <br> <br>  <br> <br> <br> <br>
    <footer class="pie-pagina">
        <p>Copyright © 2023. Fernando Ochoa<br>
        Todos los derechos reservados. </p>

    </footer>
</body>
</html>

<?php
if(isset($_POST['volveraValvulas'])) {
    header("Location:../verValvulas.php?id=$id");
}

ob_end_flush();
?>