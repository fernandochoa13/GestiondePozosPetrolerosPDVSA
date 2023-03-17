<?php 
ob_start();
include("../conexiondb.php");
$id = $_GET['id'];
$query = "SELECT * from pozo where idPozo=$id";
$resultado = mysqli_query($conn,$query);
$rows = mysqli_fetch_array($resultado);
$queryValvula = "SELECT * from registro where Pozo_IdPozo=$id";
$resultadoValvula = mysqli_query($conn, $queryValvula);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Valvula en el pozo <?php echo $rows['nombrePozo']?> </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="../assets/images/pdvsaLogo.png">
</head>
<body>
<nav class="IndicePagina">
        <a href="../index.php"><img src="../assets/images/PDVSA.png" alt="Pdvsa Logo" class="imagenPDVSA"></a>
    </nav>
    <div class="container-Valvulas"><br>
    <h2>Pozo: <?php echo $rows['nombrePozo'] ?></h2> <br>
    <h2>Ciudad: <?php echo $rows['ciudad'] ?></h2> <br>
    <h2>Valvulas Registradas</h2><br> <br>
    <table class="table">
    <thead class="table-dark">
        <tr>
            <th>Id Registro</th>
            <th>Fecha y Hora del Registro</th>
            <th>Valor PSI</th>
            <th>Editar Valvula</th>
            <th>Borrar Valvula</th>
        </tr>
    </thead>
        <?php while ($rows2 = mysqli_fetch_array($resultadoValvula)){
            ?>
            <tr>
            <td > <?php echo $rows2['idregistro']; ?> </td>
            <td > <?php echo $rows2['fechayhora']; ?> </td>
            <td > <?php echo $rows2['valorPSI']; ?> </td>
            <td > <a href="opcionesValvulas/editarValvula.php?id=<?php echo $rows2['idregistro']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a> </td>
            <td > <a href="opcionesValvulas/borrarValvula.php?id=<?php echo $rows2['idregistro']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a> </td>
            </tr>
            <?php 
              } ?>
    </table> <br> <br>
    <form action="" method="POST">
    <input type="submit" value="Registrar Nueva Valvula" name="registroValvulaBoton" class="btn btn-success">
       <input type="submit" value="Ver Grafica Comparativa" name="verGraficoBoton" class="btn btn-success">
          <br> <br><br><br><br><br><br>
          </form>
    <footer class="pie-pagina">
        <p>Copyright © 2023. Fernando Ochoa<br>
        Todos los derechos reservados. </p>
        
    </footer>
</body>
</html>

<?php
if(isset($_POST['registroValvulaBoton'])){
    header("Location:opcionesValvulas/formValvula.php?id=$id");
}

if(isset($_POST['verGraficoBoton'])) {
    header("Location:opcionesValvulas/verGrafico.php?id=$id");
}

ob_end_flush();
?>
