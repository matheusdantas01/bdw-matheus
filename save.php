<!DOCTYPE html>
<html>

<head>
	<title>BDW - Matheus Bonfim Dantas</title>
</head>

<body>

    <h1>Salvar</h1>


    <?php
        $nome =  $_POST["nome"];
        $email =  $_POST["email"];
        $senha = sha1($_POST["senha"]);

	    $servername = "sql301.epizy.com";
	    $username = "epiz_30990652";
	    $password = "w6gfe7EaHOb";
	    $dbname = "epiz_30990652_meubanco";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO usuario (nome, email, senha)  VALUES ( '".$nome."' , '".$email."', '".$senha."')";

        if ($conn->query($sql) === TRUE) {
        header('Location: index.php?msg=Usuario cadastrado com sucesso!');
        exit;
        } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    ?>
    

<br>
    <a href = "index.php">voltar</a>
</body>
</html>
