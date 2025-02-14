<?php 

require_once '../config/conn.php';

function updatePersonas($idPrn,$nombrePrn,$telefonoPrn){

    global $conn;

    try {

        $sql = "UPDATE personas SET nombrePrn = :nombre, telefonoPrn = :telefono  WHERE idPrn = :id";


        $query = $conn->prepare($sql);

        $query->bindParam(':id',$idPrn);
        $query->bindParam(':nombre',$nombrePrn);
        $query->bindParam(':telefono',$telefonoPrn);


        if($query->execute()){

            if ($query->rowCount()>0) {
                return "Registro actualizado : ".$nombrePrn. " ".$telefonoPrn;
            }else{
                return "No hay registro para actualizar.";
            }
        }else{

            return "Error al actualizar registro";
        }



    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

?>