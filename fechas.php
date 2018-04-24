<?php

$fecha = "1970/1/1";
$fecha = date("d-m-Y", $fecha);

$diasDiferencia = 25569;
$segundosPorDia = 86400;
$fechaSegundos = strtotime($fecha);

$fechaNumero1 = ceil(($fechaSegundos / $segundosPorDia)) + $diasDiferencia;

$fechaNumero2 = ($segundosPorDia * $diasDiferencia);

echo $fecha . "\n";
echo $fechaSegundos . "\n";
echo $fechaNumero1 . "\n";
echo $fechaNumero2 . "\n";
?>