<?php
require_once('cors.php');
require_once('conexion.php');
$data = json_decode(file_get_contents("php://input"), true);

$nombre = $data['nombre'];
$precio = $data['precio'];
$cantidad = $data['cantidad'];
$modelo = new Conexion();
$db = $modelo->getConexion();

$sql = "INSERT INTO producto(nombre, precio, cantidad) 
        VALUES(:nombre, :precio,:cantidad)";

     $query = $db->prepare($sql);
     $query->bindParam(':nombre', $nombre);
     $query->bindParam(':precio', $precio);
     $query->bindParam(':cantidad', $cantidad);

  $query->execute();
echo "registrado";
?>