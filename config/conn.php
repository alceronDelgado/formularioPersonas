<?php 

$user = 'root';
$password = '';
$dbname = 'personasbd';
$host = 'localhost';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>