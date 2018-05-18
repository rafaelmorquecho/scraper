<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
ini_set('max_execution_time', 50000);

require "datos_conexion.php";
for ($idrecord = 6800; $idrecord < 6850; $idrecord++) {
$info =array();  
    
    $html = utf8_encode(file_get_contents("http://www.fitri.it/le-gare/calendario-gare/gara/" . $idrecord .".html")); 
    
   if (preg_match('/<span class="">(.*?)<\/span>/i', $html, $poblacion) > 0) $poblacion = $poblacion[1];
   
    
   //preg_match('/<span class="">(.*?)<\/span>/i', $html, $poblacion);
    
    //preg_match('/<span class="">Sito web: <a href="(.*?)" target="_blank">/i', $html, $web);
    
    //preg_match('/<span class="referente">(.*?)<\/span>/i', $html, $referente);
    
    //preg_match('/<span class="telefono">Tel.:(.*?)<\/span>/i', $html, $telefono);
    
    
            
            //preg_match_all('/<span class=(.*?)<\/span>/i', $html, $info);
            
           /* if(!empty($info[0][13])){
                $datos['id_web']=$idrecord;
                $datos['poblacion']=strip_tags($info[0][13]);
                $datos['web']= strip_tags($info[0][16]);
                $datos['referente']=strip_tags($info[0][19]);
                $datos['telefono']=strip_tags($info[0][20]);
                $datos['email']=strip_tags($info[0][21]);
                $datos['Organizzatore']=strip_tags($info[0][22]);
                $datos['telefono2']=strip_tags($info[0][23]);
                $datos['email2']=strip_tags($info[0][24]);
                
                */
           
            
            //echo $info[0][19];
            
            
           /* try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$sql = "INSERT INTO calendariopodismo VALUES ($referencia, ". "\"" . $lugar."\"" . ",'$dia','$fecha',". "\"" . $nombre ."\"" . ",'$km','$email','$telefonos',". "\"" . $nombre ."\"" . ");";
            $sql = "INSERT INTO `calendario_gare` (`id`, `poblacion`, `web`, `referente`, `telefono`, `email`, `Organizzatore`, `telefono2`, `email2`) VALUES (' '," . "\"" . $datos['poblacion']. "\"" . ", " . "\"" .  $datos['web']. "\"" . "," . "\"" . $datos['referente']. "\"" . "," . "\"" .  $datos['telefono'] ."\"" . "," . "\"" . $datos['email']. "\"" . "," . "\"" . $datos['Organizzatore']. "\"" . "," . "\"" . $datos['telefono2'] . "\"" . "," . "\"" . $datos['email2']. "\"" . ");";
            //echo $sql;
            $insertar = $conn->prepare($sql);
            $insertar->execute();
            $cuenta = $insertar->rowCount();
            
            // echo "<div><p>" . $referencia . "<br>" . $lugar . "<br>" . $dia . "<br>" . $fecha . "<br>" . $nombre . "<br>" . $km . "<br>" . $email . "<br>" . $telefonos . "<br>" . $notas . "</p></div>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }*/
    
    
    
    
            }
    
    
    
    
    
    /*if (preg_match('/<strong>Riferimento:<\/strong>(.*?)<br>/i', $html, $referencia) > 0) {
    $referencia = $referencia[1];}*/
    
        
    
      //echo "<pre>" . print_r($info[0],true) . "</pre>"; 
      //echo "<pre>" . print_r($datos,true) . "</pre>"; 
    echo $idrecord;
    echo "<pre>" . print_r($poblacion,true) . "</pre>";
    //echo "<pre>" . print_r($web,true) . "</pre>";
    //echo "<pre>" . print_r($referente,true) . "</pre>";
    
    
}
//<div class="detail-info"><span class="">
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
?>