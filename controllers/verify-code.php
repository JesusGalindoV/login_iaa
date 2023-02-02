<?php

session_start();

if($_POST){
    $codigo = $_POST['codigo'];

    require '../main_app/conexion.php';

    $mysqli->set_charset("utf8");

    $nombre = $_SESSION['nombre'];
    $tipo = $_SESSION["tipo"];
    $codigoUser = $_SESSION['codigo'];

    if($codigo == $codigoUser){
        $sql = "UPDATE Usuarios SET verificado = '1' WHERE Nombre = '$nombre' ";
        if($tipo == "admin"){
            if($mysqli->query($sql) === TRUE){
                // echo "OKk";
                header("Location: ../main_app/admin/index.php");
            }else{
                echo "ERROR";
            }
        }else if($tipo == "usuario"){
            if($mysqli->query($sql) === TRUE){
                // echo "OKk";
                header("Location: ../main_app/usuario/index.php");
            }else{
                echo "ERROR";
            }
        }
    }else{
        header("Location: ../main_app/views/code-error.php");
    }

}


?>