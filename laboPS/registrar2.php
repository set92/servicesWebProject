<?php

if (!isset($_POST['iEmail'])) {
    echo 'Fallo, <a href="Registrar.php">Volver a intentar</a>.';
}
else{
    include "configuracion.php";
    $conn = mysqli_connect($host, $user, $pass, $db);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $email=$_POST['email'];
    $nombre=$_POST['nombre'];
    $nick=$_POST['nick'];
    $password=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    $imagetmp=$_POST['image'];

    if (!empty($email) && !empty($enunciado) && !empty($correcta) && !empty($inco1) && !empty($inco2) &&
        !empty($inco3) && !empty($comp) && !empty($tema) && strlen($password) >= 6 &&
        strcmp($password, $pass2) == 0 &&
        preg_match('/^[a-Z]$/', $nick) &&
        preg_match('/^[a-Z] [a-Z]$/', $nombre) &&
        preg_match('/^[a-z]+[0-9]{3}\@ikasle\.ehu\.(es|eus)/', $email)){
        if (empty($_FILES["image"]["type"]))
            $imagetmp = addslashes(file_get_contents("./uploads/empty.jpg", true));
        else
            $imagetmp = addslashes(file_get_contents($_FILES['image']['tmp_name']));

        $sql="INSERT INTO usuario(email, nombre, nick, pass,  image) VALUES
              ('$email','$nombre','$nick','$password', '$imagetmp')";
    }else{
        echo 'Fallo, <a href="Registrar.php">Volver a intentar</a>.';
        return;//Para que salga y no continue con la SQL
    }
    echo '<p> <a href="VerPreguntasConFoto.php"> Ver registros</a>';
    mysqli_close($conn);
}
