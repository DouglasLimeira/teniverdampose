<?php
    if(isset($_POST['enviar'])) {

        $filme     = $_POST['filme'];
        $indicador = $_POST['indicador'];
        $ondeEncontrar = $_POST['ondeEncontrar'];
        
        $conn = new PDO('mysql:host=sql10.freemysqlhosting.net;dbname=sql10289766','sql10289766','H4XdjMq1y6');
        $sqlInsert = "INSERT INTO indicacao (filme, indicador, ondeEncontrar) VALUES (?,?,?)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->execute([$filme,$indicador,$ondeEncontrar]);

    }
    header("location:index.php");
?>
