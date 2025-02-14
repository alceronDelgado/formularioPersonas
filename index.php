<?php 
session_start();
require_once 'config/conn.php';
require_once 'src/functionsQuerys.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Personas</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Formulario Persona</h1>
    <div class="container">
        <form action="src/querys.php" method="post">
            <input type="number" name="idPrn" id="" placeholder="cedula" required >
            <input type="hidden" name="case" value="1">
            <input type="text" name="nombrePrn" id=""   placeholder="nombre" required>
            <input type="text" name="telefonoPrn" id=""     placeholder="number" required>
            <button type="submit" class="material-icons green">save
                
            </button>
            
        </form>
    </div>

    <div class="containerRespuesta">
        <span>
            <?php 
                if(isset($_SESSION['mensaje'])){

                    echo $_SESSION['mensaje'];

                    unset($_SESSION['mensaje']);
                }

            ?>
        </span>
    </div>

    <div class="table">
        <table>
            <caption>Tabla personas</caption>
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <!-- vista de los registros. -->
                 <?php 

                    //consulta select * from personas.
                    $fetchPersonas = fetchPersons();

                    foreach ($fetchPersonas as $row) { ?>

                    <tr>
                <td><?php echo $row['idPrn']; ?></td>
                <td><?php echo $row['nombrePrn']; ?></td>
                <td><?php echo $row['telefonoPrn']; ?></td>
                <td>
                    <a href="index.php?idPrn=<?php echo $row['idPrn']; ?>&nombrePrn=<?php echo $row['nombrePrn']; ?>&telefonoPrn=<?php echo $row['telefonoPrn']; ?>">
                        <i class="material-icons left">edit</i>
                    </a>
                    <form action="src/querys.php" method="post">
                        <input type="hidden" name="idPrn" value="<?php echo $row['idPrn']; ?>" class="">
                        <input type="hidden" name="case" value="3">
                        <button type="submit"><i class="material-icons">delete</i></button>
                    </form>
                    
                </td>
                </tr>

                <?php 
                }
                ?>    
                 
            </tbody>
        </table>
        <div class="containerEditForm">
            <h3>
                <?php 

                    if(!empty($_SESSION['mensajeUpdate'])){
                        echo $_SESSION['mensajeUpdate'];
                    }
                    unset($_SESSION['mensajeUpdate']);
                
                ?>
            </h3>

        <?php 
            if (isset($_GET['idPrn']) && isset($_GET['nombrePrn']) && isset($_GET['telefonoPrn'])) {



                $idPrnGet = $_GET['idPrn'];
                $nombrePrnGet = $_GET['nombrePrn'];
                $telefonoPrnGet = $_GET['telefonoPrn'];      
        ?>
            <form action="src/querys.php" method="post">
                <input type="hidden" name="case" value="2">
                <input type="number" name="idPrnUpdate" id="" placeholder="cedula" value='<?php echo $idPrnGet; ?>' readonly>
                <input type="text" name="nombrePrnUpdate" id=""   placeholder="nombre" value='<?php echo $nombrePrnGet; ?>'>
                <input type="text" name="telefonoPrnUpdate" id="" placeholder="number" value='<?php echo $telefonoPrnGet; ?>'>
                <input type="submit" value="editar">
            </form>


            <?php 
                //Destruyo las variables luego de su uso.
                unset($idPrnGet,$nombrePrnGet,$telefonoPrnGet);

            }else{
                echo "";
            }

            ?>
            
        </div>
        <div class="deleteMessage">
            <span>
                <?php 
                    if(!empty($_SESSION['mensajeDelete'])){
                        echo $_SESSION['mensajeDelete'];
                    }
                    unset($_SESSION['mensajeDelete']);
                ?>
            </span>
        </div>

    </div>
    <script src="assets/js/materialize.min.js"></script>
    
</body>
</html>