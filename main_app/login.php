<?php

session_start();

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    
    require 'conexion.php';
    sleep(2);

    $mysqli->set_charset("utf8");

    $usuario = $mysqli->real_escape_string($_POST['Username']);
    $pass = $mysqli->real_escape_string($_POST['Password']);

    if($nueva_consulta = $mysqli->prepare("SELECT Nombre, tipo_usuario FROM Usuarios WHERE Usuario = ? AND Password = ?")){
        
        $nueva_consulta->bind_param('ss', $usuario, $pass);
        $nueva_consulta->execute();
        $resultado = $nueva_consulta->get_result();

        if($resultado->num_rows == 1){
            $datos = $resultado->fetch_assoc();
            echo json_encode(array('error' => false, 'tipo' => $datos['tipo_usuario']));

            // $_SESSION['id'] = $datos->id;
            $_SESSION['nombre'] = $datos['Nombre'];
            $_SESSION['tipo'] = $datos['tipo_usuario'];

        }else{
            echo json_encode(array('error' => true));
        }

        $nueva_consulta->close();
    }
}

$mysqli->close();
?>