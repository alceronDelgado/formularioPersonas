<?php 

$user = "root";
$password = "";
$server = "localhost";
$db = "formulariopersonas";

$conn = mysqli_connect($server,$user,$password,$db);

if($conn){
    //echo "Conexión exitosa";
}else{
    die(1);
}



?>