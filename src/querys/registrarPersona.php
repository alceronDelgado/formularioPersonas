<?php 

include'../../config/conn.php';
session_start();

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mensaje = "Registro exitoso";

$query = "INSERT INTO personas(cedula,nombre,apellido) VALUES($cedula,'$nombre','$apellido')";

$result = mysqli_query($conn,$query);

if(isset($result)){
    $_SESSION['mensaje'] = $mensaje."".$cedula;
    header("location:../../index.php");
}

?>