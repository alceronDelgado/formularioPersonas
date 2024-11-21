<?php 

$user = "root";
$password = "";
$server = "localhost";
$db = "formulariopersonas";

$query = mysqli_connect($server,$user,$password,$db);

if($query){
    echo "Conexión exitosa";
}else{
    die(1);
}



?>