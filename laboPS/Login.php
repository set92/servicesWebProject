<form action="Login.php" method="post">
    <p> Email : <input type="email" required name="email"/>
    <p> Password : <input type="pass" required name="pass"/>
</form>
<div id="nombrelogin"></div>

<?php
$email=$_POST['email'];
$pass=$_POST['pass'];

$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($email) && isset($pass)) {
    $usuarios = mysqli_query($conn, "select * from usuarios where email='$email' and password='$pass'");
    $cont = mysqli_num_rows($usuarios);
    mysqli_close();
}
if($cont==1) {
    echo("<script> alert ('BIENVENIDO AL SISTEMA: $username');
        document.getElementById('nombrelogin').innerHTML='$username';</script>");

    echo("Login correcto<p><a href='layout.php?op=preguntas&user=1&email=$username'>
            Puede acceder a las aplicaciones para usuarios registrados</a>");
}else{
    echo ("<p style='color:red;'>Parametros de login incorrectos</p><a href='layout.php?op=login'>Puede intentarlo
de nuevo</a>");}
?>