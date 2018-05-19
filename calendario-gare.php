<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('max_execution_time', 50000);

require "datos_conexion.php";

for ($idrecord = 0; $idrecord < 7000; $idrecord++) {
    $info = array();
    $datos['id'] = $idrecord;

    if ($html = utf8_encode(file_get_contents("http://www.fitri.it/le-gare/calendario-gare/gara/" . $idrecord . ".html"))) {


        if (preg_match('/<span class="">(.*?)<\/span>/i', $html, $poblacion) > 0) {
            $datos['poblacion'] = strip_tags($poblacion[1]);
        } else {
            $datos['poblacion'] = "";
        }

        if (preg_match('/<span class="">Sito web: <a href="http:\/\/(.*?)" target="_blank">/i', $html, $web) > 0) {
            $datos['web'] = strip_tags($web[1]);
        } else {
            $datos['web'] = "";
        }

        if (preg_match_all('/<span class="referente">(.*?)<\/span>/i', $html, $referente) > 0) {
            $datos['organizzatore'] = strip_tags($referente[1][0]);
            if (count($referente[1]) > 1) {
                $datos['referente'] = strip_tags($referente[1][1]);
            } else {
                $datos['referente'] = "";
            }
        } else {
            $datos['organizzatore'] = "";
            $datos['referente'] = "";
        }

        if (preg_match_all('/<span class="telefono">Tel.: (.*?)<\/span>/i', $html, $telefono) > 0) {
            $datos['telefono'] = strip_tags($telefono[1][0]);
            if (count($telefono[1]) > 1) {
                $datos['telefono2'] = strip_tags($telefono[1][1]);
            } else {
                $datos['telefono2'] = "";
            }
        } else {
            $datos['telefono'] = "";
            $datos['telefono2'] = "";
        }

        if (preg_match_all('/<span class="email"><a href="mailto:(.*?)<\/a><\/span>/i', $html, $email) > 0) {
            $datos['email'] = strip_tags($email[0][0]);
            if (count($email[1]) > 1) {
                $datos['email2'] = strip_tags($email[0][1]);
            } else {
                $datos['email2'] = "";
            }
        } else {
            $datos['email'] = "";
            $datos['email2'] = "";
        }


        echo "<pre>" . print_r($telefono, true) . "</pre>";
        echo "<pre>" . print_r($referente, true) . "</pre>";
        echo "<pre>" . print_r($web, true) . "</pre>";
        echo "<pre>" . print_r($email, true) . "</pre>";
        echo "<pre>" . print_r($datos, true) . "</pre>";


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$sql = "INSERT INTO calendariopodismo VALUES ($referencia, ". "\"" . $lugar."\"" . ",'$dia','$fecha',". "\"" . $nombre ."\"" . ",'$km','$email','$telefonos',". "\"" . $nombre ."\"" . ");";
            $sql = "INSERT INTO `calendario_gare` (`id`, `poblacion`, `web`, `referente`, `telefono`, `email`, `Organizzatore`, `telefono2`, `email2`) VALUES (" . $datos['id'] . "," . "\"" . $datos['poblacion'] . "\"" . ", " . "\"" . $datos['web'] . "\"" . "," . "\"" . $datos['referente'] . "\"" . "," . "\"" . $datos['telefono'] . "\"" . "," . "\"" . $datos['email'] . "\"" . "," . "\"" . $datos['organizzatore'] . "\"" . "," . "\"" . $datos['telefono2'] . "\"" . "," . "\"" . $datos['email2'] . "\"" . ");";
            //echo $sql;
            $insertar = $conn->prepare($sql);
            $insertar->execute();
            $cuenta = $insertar->rowCount();
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    } else {
        echo $datos['id'] . " error";
    }
}
?>

