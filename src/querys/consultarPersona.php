<?php 

session_start();


include'../../config/conn.php';

$query = "SELECT * FROM personas";

$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['result'] = array($row['cedula'],$row['nombre'],$row['nombre']);
    }
}else{
    $mensaje = "sin Registros";
    $_SESSION['result'] = $mensaje;

}

mysqli_close($conn);

?>