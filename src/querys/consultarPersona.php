<?php 

session_start();
$_SESSION['result'] = array();
$_SESSION['mensaje'] = "";

include'../../config/conn.php';
$personas= [];

$query = "SELECT * FROM personas";

$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        
        $_SESSION['result'] = $row;
        $_SESSION['mensaje']="hello world";
    
        break;
    }
    
}




// while($i < COUNT($_SESSION['result'])){
//     echo $_SESSION['result'][$i]."\n";
// $i++;
// echo $i;
//     break;
// }



mysqli_close($conn);

?>