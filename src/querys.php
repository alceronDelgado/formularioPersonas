<?php
session_start();
require_once '../config/conn.php';
require_once 'functionsInserts.php';
require_once 'functionsUpdates.php';
require_once 'functionsDeletes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $case = $_POST['case'];

    switch ($case) {
        //Case para insert
        case '1':

            echo $case;

            $idPrn = $_POST['idPrn'];
            $nombrePrn = $_POST['nombrePrn'];
            $telefonoPrn = $_POST['telefonoPrn'];

            //Como esta función retorna algo, lo ideal es guardar ese mensaje en una variable para mostrarla al usuario.
            $mensaje = insertPerson($idPrn,$nombrePrn,$telefonoPrn);

            $_SESSION['mensaje'] = $mensaje;

            //Redireccionar con un mensaje de exito
            header("location: ../index.php");
            
            
            break;


            case '2':
                //Case para update.
                echo $case;

                $idPrn = $_POST['idPrnUpdate'];
                $nombrePrn = $_POST['nombrePrnUpdate'];
                $telefonoPrn = $_POST['telefonoPrnUpdate'];

                $respuestaUpdate = updatePersonas($idPrn,$nombrePrn,$telefonoPrn);

                $_SESSION['mensajeUpdate'] = $respuestaUpdate;
                //Redireccionar con un mensaje de exito
                header("location: ../index.php");


                exit;


        case '3':

            $idPrn = $_POST['idPrn'];

            $mensajeDelete = deletePerson($idPrn);
            $_SESSION['mensajeDelete'] = $mensajeDelete;
            header("location: ../index.php");
            

        break;        
        
        default:
            echo "error";
            break;
    }

    // $idPrn = $_POST['idPrn'];
    // $nombrePrn = $_POST['nombrePrn'];
    // $telefonoPrn = $_POST['telefonoPrn'];

    // //Como esta función retorna algo, lo ideal es guardar ese mensaje en una variable para mostrarla al usuario.
    // $mensaje = insertPerson($idPrn,$nombrePrn,$telefonoPrn);

    // $_SESSION['mensaje'] = $mensaje;

    // //Redireccionar con un mensaje de exito
    // header("location: ../index.php");
    // exit;
}

?>