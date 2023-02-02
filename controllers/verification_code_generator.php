<?php

    function code(){

        require '../main_app/conexion.php';

        $verification_code = rand(999,10000);

            $nombre = $_SESSION['nombre'];
            $sql = "UPDATE Usuarios SET codigo = '$verification_code' WHERE Nombre = '$nombre' ";
            if($mysqli->query($sql) === TRUE){
                echo "OK";
            }else{
                echo "ERROR";
            }

        return $verification_code;

    }

?>
