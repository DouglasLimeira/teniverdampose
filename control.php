<?php
    if(isset($_POST['enviar'])) {

        $filme     = $_POST['filme'];
        $indicador = $_POST['indicador'];
        $ondeEncontrar = $_POST['ondeEncontrar'];
        
        $conn = new PDO('mysql:host=localhost;dbname=teniverdampose','root','');
        $sqlInsert = "INSERT INTO indicacao (filme, indicador, assistidoDouglas, assistidoJonny, assistidoArtur, ondeEncontrar) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->execute([$filme,$indicador, false, false, false, $ondeEncontrar]);

    } else {
        $idSelecionado     = $_POST['filmeSelecionado'];
        $indicadorSelecionado = $_POST['indicadorSelecionado'];
        
        $conn = new PDO('mysql:host=localhost;dbname=teniverdampose','root','');
        $sql = "SELECT * FROM indicacao WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idSelecionado]);
        $filmeSelecionado = $stmt->fetch();
        
        $assistido = false;
        if($indicadorSelecionado =='artur') {
            $assistido = $filmeSelecionado['assistidoArtur'];
            
            $conn = new PDO('mysql:host=localhost;dbname=teniverdampose','root','');
            $sqlUpdate = "UPDATE indicacao SET assistidoArtur = ? WHERE id = ?";
            $stmt = $conn->prepare($sqlUpdate);
            $stmt->execute([!$assistido, $idSelecionado]);
            $assistido = false;
        } else if($indicadorSelecionado =='douglas') {
            $assistido = $filmeSelecionado['assistidoDouglas'];
            
            $conn = new PDO('mysql:host=localhost;dbname=teniverdampose','root','');
            $sqlUpdate = "UPDATE indicacao SET assistidoDouglas = ? WHERE id = ?";
            $stmt = $conn->prepare($sqlUpdate);
            $stmt->execute([!$assistido, $idSelecionado]);
            $assistido = false;
        } else if($indicadorSelecionado =='jonny') {
            $assistido = $filmeSelecionado['assistidoJonny'];
            
            $conn = new PDO('mysql:host=localhost;dbname=teniverdampose','root','');
            $sqlUpdate = "UPDATE indicacao SET assistidoJonny = ? WHERE id = ?";
            $stmt = $conn->prepare($sqlUpdate);
            $stmt->execute([!$assistido, $idSelecionado]);
            $assistido = false;
        }
    }
    header("location:index.php");
?>
