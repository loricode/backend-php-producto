<?php
require_once('cors.php');
require_once('conexion.php');

$data = json_decode(file_get_contents("php://input"), true);
 $id = $data['id']; 
 $nombre = $data['nombre'];
 $precio = $data['precio'];
 $cantidad = $data['cantidad'];
 $modelo = new Conexion();
 $db = $modelo->getConexion();

$sql = "UPDATE producto SET nombre='$nombre', precio='$precio'
         ,cantidad='$cantidad' WHERE id=$id";

 $query = $db->prepare($sql);
 $query->execute();
 echo "actualizado";

  ?>