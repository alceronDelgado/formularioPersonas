<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <div class="header">
        <h1>Formulario</h1>
    </div>

    <div class="container">
        <form action="src/querys/registrarPersona.php" method="post">
            <label for="">Cedula</label>
            <input type="number" name="cedula" id="">
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="">
            <label for="">apellido</label>
            <input type="text" name="apellido" id="">
            <input type="submit" value="enviar">
        </form>
    </div>

    <div class="respond">
        <span> RESPUESTA:
            <?php 

            if(isset($_SESSION['mensaje'])){

                echo $_SESSION['mensaje'];   
            }

            session_destroy();

            ?>
        
        </span>
    </div>

    <div class="view">
        <table>
            <td>
                <th>A</th>
                <th>B</th>
                <th>C</th>
            </td>
            <td>
                <th></th>
                <th></th>
            </td>
        </table>
    </div>
    
</body>
</html>


