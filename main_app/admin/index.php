<?php
session_start();

if(empty($_SESSION['tipo'])){
    header("Location: ../../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Bienvenid@ <?php echo $_SESSION["nombre"] ?> tu rol es: <?php echo $_SESSION["tipo"] ?></h1>

<a href="../../controllers/logout.php">Salir</a>

<!-- <a href="../../controllers/mailer.php">enviar correo</a> -->



</body>
</html>