<!DOCTYPE html>
<html>

<body>
    <?php
        // Start the session
        session_start(); 
        echo "<h1>BDW - Matheus Bonfim"."</h1>";
        echo "Disciplina de Banco de dados para WEB" . "</br>";
    ?>
       

    <?php
        if($_SESSION["estalogado"]==true){
            echo "<h1>Seja bem vindo!".$_SESSION["email"]."</h1>";
            
            $servername = "sql301.epizy.com";
            $username = "epiz_30990652";
            $password = "w6gfe7EaHOb";
            $dbname = "epiz_30990652_meubanco";

            // Create connection
            $conn = new mysqli($servername, $username, $password ,$dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM usuario";
            $result = $conn->query($sql);
            echo "<h2>Lista de usuarios</h2>";
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["id"]. " - Name: " . $row["nome"]. " - E-mail: " . $row["email"]. "<br>";
                }
            }  else {
                    echo "0 results";
                }
            $conn->close();
            echo "</br>";
            echo "<a href = 'logout.php'> Logout</a></br>";
        } else {
             echo "Usuario nao logado." . "</br>";
             echo "<a href = 'cadastro.php'>Cadastrar</a></br>";
             echo "<a href = 'login.php'>Logar</a></br>";
            }  
    ?>
</body>

</html>
