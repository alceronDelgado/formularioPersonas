<?php 
require_once '../config/conn.php';

function deletePerson($idPrn){
    global $conn;

    try {
        $sql = "DELETE FROM personas WHERE idPrn = :idPrn";

        $sqlDelete = $conn->prepare($sql);

        $sqlDelete->bindParam(':idPrn',$idPrn);

        if ($sqlDelete->execute()) {
            return "registro inhabilitado con exito.";
        }

        exit;


    } catch (PDOException $e) {
        return $e->getMessage();
    }

    
}

?>