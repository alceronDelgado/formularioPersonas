<?php 

session_start();
$_SESSION['result']="";
$_SESSION['mensaje'] = "";

include'../../config/conn.php';

$query = "SELECT * FROM personas";

$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['result'] = array($row['cedula'],$row['nombre'],$row['nombre']);

        $_SESSION['mensaje']="hello world";

        //echo $_SESSION['result'][1];
    }
}else{
    $mensaje = "sin Registros";
    $_SESSION['result'] = $mensaje;
    echo $_SESSION['result'];

}

mysqli_close($conn);

?>