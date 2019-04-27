<html>
    <head>
        <title>Tení Verdam Posé</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            function selecionarIndicacao(filme, indicador) {
                console.log(filme);
                console.log(indicador);
                document.getElementById("filmeSelecionado").value = filme;
                document.getElementById("indicadorSelecionado").value = indicador;
                document.getElementById("formIndicacao").submit();
            }
        </script>
    </head>

    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Tení Verdam Posé</h1>
                <p class="lead">
                    Grupê dê posérs qualificaduó que achám que entendiem cineman e não acharram un 
                    sistemam eficienté para dar suas opiniês qualificadês.
                </p>
                <br />
                <br />
                
                <form id="formIndicacao" method="POST" action="control.php">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="filme" >Indicaciôn du Filmê</label>
                            <input type="text" class="form-control" id="filme" name="filme" placeholder="Filmê que vucê acha bastanti importantê">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="indicador" >Indicaduor</label>
                            <input type="text" class="form-control" id="indicador" name="indicador" placeholder="Gênier por trás du indicacion">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="indicador" >Ondê Encontrê</label>
                            <input type="text" class="form-control" id="ondeEncontrar" name="ondeEncontrar" placeholder="Ondê Encontrê">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Demonstré su</label>
                            <input type="submit" name="enviar" value="Gêialitê" class="btn btn-primary form-control"/>
                        </div>
                    </div>
                    <br />
                    <br />

                    <?php
                        $sql = "SELECT * FROM indicacao";
                        $conn = new PDO('mysql:host=sql10.freemysqlhosting.net;dbname=sql10289766','sql10289766','H4XdjMq1y6');
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $indicacoes = $stmt->fetchAll();
                        if(!empty($indicacoes)) {
                            echo '<table class="table table-striped" style="background-color: #fff;">';
                            echo '<thead class="thead-dark">';
                            echo '<tr>';
                            echo '<th scope="col">Nome do filme</th>';
                            echo '<th scope="col">Indicado por</th>';
                            echo '<th scope="col">Onde Encontrar</th>';
                            echo '</thead>';
                            echo '<tbody>';
                            
                            foreach($indicacoes as $indic) {
                                echo "<tr>";
                                echo "<td>".$indic['filme']."</td>";
                                echo "<td>".$indic['indicador']."</td>";
                                echo "<td>".$indic['ondeEncontrar']."</td>";
                                echo "</tr>";
                            }
                            echo '</tbody>';
                            echo '</table>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>