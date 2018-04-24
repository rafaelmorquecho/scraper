<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
ini_set('max_execution_time', 50000);

require "datos_conexion.php";


for ($idrecord = 50000; $idrecord < 50050; $idrecord++) {


    $html = utf8_encode(file_get_contents("http://www.calendariopodismo.it/dettagli.php?idrecord=" . $idrecord . "#.WtjX2IhuaCg")); //Convierte la información de la URL en cadena


    if (preg_match('/<strong>Riferimento:<\/strong>(.*?)<br>/i', $html, $referencia) > 0) {
        $referencia = $referencia[1];

        if (preg_match('/<strong>Luogo:<\/strong>(.*?)<br>/i', $html, $lugar) > 0)
            $lugar =  $lugar[1];
        else
            $lugar = "";

        if (preg_match('/<strong>Giorno:<\/strong>(.*?)<br>/i', $html, $dia) > 0)
            $dia = $dia[1];
        else
            $dia = "";

        if (preg_match('/<strong>Data:<\/strong>(.*?)<br>/i', $html, $fecha) > 0)
            $fecha = $fecha[1];
        else
            $fecha = "";

        if (preg_match('/<strong>Nome:<\/strong>(.*?)<br>/i', $html, $nombre) > 0)
            $nombre = $nombre[1];
        else
            $nombre = "";

        if (preg_match('/<strong>Km:<\/strong>(.*?)<br>/i', $html, $km) > 0)
            $km = $km[1];
        else
            $km = "";

        if (preg_match('/<strong>Email:<\/strong> <a href="mailto:(.*?)">/i', $html, $email) > 0)
        $email = $email[1];
        else
            $email = "";


        if (preg_match('/<strong>Telefoni:<\/strong>(.*?)<br>/i', $html, $telefonos) > 0) {
            $telefonos = $telefonos[1];
        } else
            $telefonos = "";

        if (preg_match('/<strong>Note:<\/strong>(.*?)<br>/i', $html, $notas) > 0)
            $notas =  $notas[1];
        else
            $notas = "";



        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO calendariopodismo VALUES ($referencia, ". "\"" . $lugar."\"" . ",'$dia','$fecha',". "\"" . $nombre ."\"" . ",'$km','$email','$telefonos',". "\"" . $nombre ."\"" . ");";

            $insertar = $conn->prepare($sql);
            $insertar->execute();
            $cuenta = $insertar->rowCount();
            
            // echo "<div><p>" . $referencia . "<br>" . $lugar . "<br>" . $dia . "<br>" . $fecha . "<br>" . $nombre . "<br>" . $km . "<br>" . $email . "<br>" . $telefonos . "<br>" . $notas . "</p></div>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}





$conn = null;
?>