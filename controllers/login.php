<?php

session_start();

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    
    require '../main_app/conexion.php';
    sleep(2);

    $mysqli->set_charset("utf8");

    $usuario = $mysqli->real_escape_string($_POST['Username']);
    $pass = $mysqli->real_escape_string($_POST['Password']);

    if($nueva_consulta = $mysqli->prepare("SELECT Nombre,correo,tipo_usuario,codigo,verificado FROM Usuarios WHERE Usuario = ? AND Password = ? ")){
        //AES_DECRYPT('contraseña','llave')
        $nueva_consulta->bind_param('ss', $usuario, $pass);
        $nueva_consulta->execute();
        $resultado = $nueva_consulta->get_result();

        if($resultado->num_rows == 1){
            $datos = $resultado->fetch_assoc();
            echo json_encode(array('error' => false, 'tipo' => $datos['tipo_usuario'], 'verificado' => $datos['verificado']));

            $_SESSION['nombre'] = $datos['Nombre'];
            $_SESSION['correo'] = $datos['correo'];
            $_SESSION['tipo'] = $datos['tipo_usuario'];
            $_SESSION['codigo'] = $datos['codigo'];
            $_SESSION['verificado'] = $datos['verificado'];

        }else{
            echo json_encode(array('error' => true));
        }

        $nueva_consulta->close();
    }
}

$mysqli->close();
?>