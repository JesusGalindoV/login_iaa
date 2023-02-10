<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | IAA</title>
	
	<link rel="shortcut icon" href="img/yoxd.jpg" type="image/jpg"> 
    <link rel="Stylesheet" href="css/master.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	
    <div id="particles-js"></div>
    
    <!-- <div class="error">
        <span>Datos de Ingreso no válidos, intentalo de nuevo</span>
    </div> -->

    <section class="home">
        <div class="login-box">
            <img class="avatar" src="img/yoxd.jpg" alt="Jesús Antonio">
            <h1>Information Security</h1><br>
            <form action="POST" id="formlg">
                
                <!-- Username -->
                <label for="Username">Username</label>
                <input type="text" name="Username" placeholder="Username" required>
           
                <!-- Password -->
                <label for="Password">Password</label>
                <input type="password" name="Password" placeholder="Password" required> 
                
                <input class="botonlg" type="submit" value="Log In">

                <a href="#">• Lost your password</a><br>
                <a href="#">• Dont have an account</a>
            
            </form>
        </div>
    </section>
    
	<script src = "js/particles.js"></script>
	<script src = "js/app.js"></script>
    

</body>
</html>