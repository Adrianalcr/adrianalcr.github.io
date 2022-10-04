<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "adrianalima";
$sql = "mysql:host=$host;dbname=$db";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
try {
    $conn = new PDO($sql, $user, $pass, $dsn_Options);
    echo "Conectado com sucesso!";
} catch (PDOException $error) {
    echo 'Erro ao conectar com o banco de dados: ' . $error->getMessage();
}


// Set the variables for the person we want to add to the database
$nome = $_POST["nome"];
$email = $_POST["email"];
$data = date("d/m/Y");
$comentario = $_POST["comentario"];

$conn = mysqli_connect($host, $user, $pass, $db);
$sql = "INSERT INTO `tbcomentarios`(`id`, `nome`, `email`, `data`, `comentario`) VALUES ('{$id}','{$nome}','{$email}','{$data}','{$comentario}')";
//$sql = "INSERT INTO `tbcomentarios` (`nome`,`email`,data,`comentario` VALUES (`$nome`,`$email`,`$data`,`$comentario`)";

if (mysqli_query($conn, $sql)) {
    echo "<br>Nova mensagem cadastrada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: postBlog.php");
