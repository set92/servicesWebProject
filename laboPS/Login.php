<?php
if(isset($_POST['email']) && isset($_POST['pass'])) {

        $email = $_POST['email'];
        $password = $_POST['pass'];

        include "configuracion.php";
        $conn = mysqli_connect($host, $user, $pass, $db);
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        $usuarios = mysqli_query($conn, "select * from usuarios where email='$email' and pass='$password'");
        $cont = mysqli_num_rows($usuarios);
        echo($cont);
        mysqli_close($conn);

        if ($cont == 1) {
            echo("<script> alert ('BIENVENIDO AL SISTEMA: $email');
                document.getElementById('nombrelogin').innerHTML='$email';</script>");

            echo("Login correcto<p><a href='layout.php?op=preguntas&user=1&email=$email'>
            Puede acceder a las aplicaciones para usuarios registrados</a>");
        } else {
            echo("<p style='color:red;'>Parametros de login incorrectos</p>
                <a href='layout.php?op=login'>Puede intentarlo de nuevo</a>");
        }

}else{
    echo  '<form action="Login.php" method="post" class="login">
			<h2> Identificacion de Usuario </h2>
			<div>Email<input name="email" type="text" required></div>
			<div>Password<input name="pass" type="password" required></div>
			<div><input id="login" name="login" type="submit" value="login"></div>
		</form>';
}
?>