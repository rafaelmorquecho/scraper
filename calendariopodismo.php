<!DOCTYPE html>
<?php
require "datos_conexion.php";
require_once 'PHP_XLSXWriter/xlsxwriter.class.php';
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM calendariopodismo";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>

<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="estilo.css">

        <title>Hello, world!</title>
    </head>
    <body>



        <?php
        if ($resultado = $conn->query($sql)) {
            $nFilas = "<div><p>N filas :" . $resultado->rowCount() . "</p> ";
            if ($resultado->rowCount() == 0) {

                $nfilas = "<p>no hay registros</p>";
            }
        }


        $campos = "SELECT column_name FROM information_schema.columns 
WHERE Table_name = 'calendariopodismo'";
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-striped">
                        <thead class="menu-fijo">
                            <tr>
                                <?php
                                // foreach ($conn->query($campos) as $head) {
                                //     echo "<th>" . strtoupper($head[0]) . "</th>";
                                // }
                                // echo "</thead><tbody>";
                                // foreach ($conn->query($sql) as $fila) {
                                //     echo "<tr>";
                                //     for ($i=0; $i <10 ; $i++) {
                                //     if ($i == 4 && $fila[$i] != ""){ 
                                //         $fila[$i] = date("d-m-Y",strtotime($fila[4]));
                                //         echo "<td width='106'>$fila[$i]</td>";
                                //     }else{echo "<td>$fila[$i]</td>";}
                                //     print_r($fila);
                                //     }
                                //     echo "</tr>";
                                // }
////////////////////////////////////////////////////////////////////////////////////////////////
                                $cabecera = array();
                                $celda = array();
                                $i = 0;
                                $writer = new XLSXWriter();
                                foreach ($conn->query($campos) as $head) {
                                    if ($i == 3) {
                                        
                                    }
                                    $cabecera[$i] = strtoupper($head[0]);
                                    $i++;
                                }
                                var_dump($cabecera);
                                $J = 0;
                                foreach ($conn->query($sql) as $fila) {
                                    for ($i = 0; $i < 10; $i++) {
                                        if ($i == 3 && $fila[$i] != "") {
                                            //$fila[$i] = date("d-m-Y",strtotime($fila[$i]));
                                            //$fila[$i] = date("d-m-Y",$fila[$i]);
                                           
                                            $diasDiferencia = 25569;
                                            $segundosPorDia = 86400;
                                            $fechaSegundos = strtotime($fila[$i]);
                                            $fila[$i] = ceil(($fechaSegundos / $segundosPorDia)) + $diasDiferencia;

                                        }
                                        $celda[$j][$i] = $fila[$i];
                                    }
                                    $j++;
                                }
                                $formato = array(
                                    "REFERENCIA" => "0",
                                    "LUGAR" => '@',
                                    "DIA" => '@',
                                    "FECHA" => 'dd-mm-yyyy',
                                    "NOMBRE" => '@',
                                    "KM" => "0.00",
                                    "EMAIL" => '@',
                                    "TELEFONOS" => '@',
                                    "NOTAS" => '@'
                                );


                                //$writer->writeSheetHeader('carreras', $cabecera);
                                //$writer->writeSheetRow( 'carreras',$celda);
                                
                                //$writer->writeSheetHeader('carreras1', $formato);
                                //$writer->writeSheetRow( 'carreras1',$celda);


                                $writer->writeSheetRow("carreras2", $cabecera);
                                $writer->writeSheet($celda, "carreras2");

                                //$writer->writeSheetHeader('carreras3', $formato);
                                //$writer->writeSheet($celda, "carreras3");

        
                               
                                $writer->writeToFile("calendariopodismo.xlsx");

                                $conn = null;
                                ?>
                        </tbody></table></div></div></div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
