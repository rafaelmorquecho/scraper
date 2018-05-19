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
    $sql = "SELECT * FROM calendario_gare";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

if ($resultado = $conn->query($sql)) {
    $nFilas = "<div><p>N filas :" . $resultado->rowCount() . "</p> ";
    if ($resultado->rowCount() == 0) {

        $nfilas = "<p>no hay registros</p>";
    }
}


$campos = "SELECT column_name FROM information_schema.columns WHERE Table_name = 'calendario_gare'";


$cabecera = array();
$celda = array();

$writer = new XLSXWriter();
foreach ($conn->query($campos) as $head) {
    $cabecera[] = strtoupper($head[0]);
    $cabeceras = array(
        'ID' => $cabecera[0],
        'POBLACION' => $cabecera[1],
        'WEB' => $cabecera[2],
        'REFERENTE' => $cabecera[3],
        'TELEFONO' => $cabecera[4],
        'EMAIL' => $cabecera[5],
        'ORGANIZZATORE' => $cabecera[6],
        'TELEFONO2' => $cabecera[7],
        'EMAIL2' => $cabecera[8]);
}

echo "<pre>" . print_r($cabeceras, true) . "</pre>";

foreach ($conn->query($sql) as $fila) {
    $celda['ID'] = $fila[0];
    $celda['POBLACION'] = $fila[1];
    $celda['WEB'] = $fila[2];
    $celda['REFERENTE'] = $fila[3];
    $celda['TELEFONO'] = $fila[4];
    $celda['EMAIL'] = $fila[5];
    $celda['ORGANIZZATORE'] = $fila[6];
    $celda['TELEFONO2'] = $fila[7];
    $celda['EMAIL2'] = $fila[8];

    $celdas[] = $celda;
}



echo "<pre>" . print_r($celdas, true) . "</pre>";









$writer->writeSheetRow("carreras", $cabeceras);
$writer->writeSheet($celdas, "carreras");





$writer->writeToFile("calendario_gare.xlsx");

$conn = null;
?>
                        