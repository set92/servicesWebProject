<?php
include "configuracion.php";
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$email=$_POST['email'];
$nombre=$_POST['nombre'];
$nick=$_POST['nick'];
$password=$_POST['pass1'];
$pass2=$_POST['pass2'];
$imagetmp;

if (!empty($email) && !empty($nombre) && !empty($nick) && !empty($password) && !empty($pass2) &&
    strlen($password) >= 6 && strcmp($password, $pass2) == 0 &&
    preg_match('/^([a-zA-Z])+$/', $nick) &&
    preg_match('/^([a-zA-Z])+ ([a-zA-Z])+$/', $nombre) &&
    preg_match('/^[a-z]+[0-9]{3}\@ikasle\.ehu\.(es|eus)/', $email)){
    if (empty($_FILES["image"]["type"]))
        $imagetmp = addslashes(file_get_contents("./uploads/empty.jpg", true));
    else
        $imagetmp = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $sql="INSERT INTO $db.usuarios(email, nombre, nick, pass, image) VALUES
          ('$email','$nombre','$nick','$password', '$imagetmp')";
    $conn->query($sql);
}else{
    echo 'Fallo, <a href="Registrar.php">Volver a intentar</a>.';
    return;
}
echo '<p> <a href="layout.php"> Ver Layout</a>';
mysqli_close($conn);
