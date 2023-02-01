<?php
require 'conexion.php';

$usuarios = $mysqli->query("SELECT Nombre, tipo_usuario FROM Usuarios WHERE Usuario = '".$_POST['Username']."'AND Password = '".$_POST['Password']."'");

?>