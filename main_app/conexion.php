<?php 

    require('../vendor/autoload.php');

    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();

    $server = $_ENV['DB_SERVER'];
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $database = $_ENV['DB_DATABASE'];

    $mysqli = new mysqli($server,$username,$password,$database);
    if($mysqli->connect_errno):
        echo "Errror al conectarse con MySQL debido al error ".$mysqli->connect_error;
    endif;
?>