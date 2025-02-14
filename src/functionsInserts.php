<?php 

require_once '../config/conn.php';
function insertPerson($idPrn,$nombrePrn,$telefonoPrn){

    //Se usa global PORQUE $conn es una variable que esta FUERA DE LA FUNCIÓN, pero lo recomendable es usar require_once
    global $conn;

    try {
        $sql = "INSERT INTO personas (idPrn,nombrePrn,telefonoPrn) VALUES (:idPrn,:nombrePrn,:telefonoPrn)";

        $stm = $conn->prepare($sql);
    
        $stm->bindParam(':idPrn',$idPrn);
        $stm->bindParam(':nombrePrn',$nombrePrn);
        $stm->bindParam(':telefonoPrn',$telefonoPrn);
    
        $stm->execute();

        //Cerramos la consulta
        $stm = null;
        //Cerramos la conexión
        $conn = null;
        return "Registro agregado a la BD Exitosamente";
        
    } catch (PDOException $e) {
        return "Error".$e->getMessage();
    }

    
    
}


?>