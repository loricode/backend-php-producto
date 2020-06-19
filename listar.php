<?php 
include('cors.php');
include('conexion.php');
 $array=array();
 $modelo = new Conexion();
 $db = $modelo->getConexion();
 $sql = 'SELECT id, nombre, precio, cantidad FROM producto ORDER BY nombre';
 $query = $db->prepare($sql);
 $query->execute();
   
  while($fila = $query->fetch()) {
    $array[] = array(
      "id" => $fila['id'],
      "nombre" => $fila['nombre'],
      "precio" => $fila['precio'],
      "cantidad" => $fila['cantidad'] ); }//fin del ciclo while 

  $json = json_encode($array);

  echo $json;
?>