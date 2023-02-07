<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../../img/yoxd.jpg" type="image/jpg"> 
    <link rel="Stylesheet" href="../../css/master.css">

    <title>Verifica tú Identidad</title>
</head>
<body>

<h3 class="no-verified"><?php echo $_SESSION["nombre"] ?> NO ESTAS VERIFICADO <?php echo $_SESSION['correo'] ?></h3>


    <section class="home">
        <div class="login-box">
            <img class="avatar" src="../../img/yoxd.jpg" alt="Jesús Antonio">
            <h1>Check code</h1><br>
            <form method="POST" action="../../controllers/verify-code.php" id="formCode">
                
                <label for="codigo">Code:</label>
                <input type="number" name="codigo" placeholder="0000" required>
                
                <input class="boton-check" type="submit" value="check code">

                <!-- <a class="send-code" href="../../controllers/verify-code.php">test</a> -->
                <p>Don't have a code?... Generate one to validate your identity.</p>
                <br>
                <a class="send-code" href="../../controllers/mailer.php">Send Code</a>
            
            </form>
        </div>
    </section>

    <script>
        document.body.onclick= function(e){
            e=window.event? event.srcElement: e.target;
            if(e.className && e.className.indexOf('send-code')!=-1)alert('Codigo enviado al correo electronico');
        }
    </script>

</body>
</html>