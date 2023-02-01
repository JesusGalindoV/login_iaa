<?php 
    $mysqli = new mysqli('localhost','root','chuchinj002911','login_iaa');
    if($mysqli->connect_errno):
        echo "Errror al conectarse con MySQL debido al error ".$mysqli->connect_error;
    endif;
?>