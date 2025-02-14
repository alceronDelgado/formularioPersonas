<?php 

//la comenté porque como esta funcion la estoy importando en index.php no hay necesidad de importar la conexión ya que allí está ya importado el archivo.
// require_once 'config/conn.php';
function fetchPersons(){
    global $conn;

    try {

        $sql = "SELECT * FROM personas";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        return $e->getMessage();
    }



    
}

?>