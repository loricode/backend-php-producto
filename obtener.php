<?php 
 require_once('cors.php');
 require_once('conexion.php');
 $array=array();
 $data = json_decode(file_get_contents("php://input"), true);
 $id = $data['id'];
 $modelo = new Conexion();
 $db = $modelo->getConexion();
 $sql = "SELECT id, nombre, precio, cantidad FROM producto WHERE id='$id'";
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