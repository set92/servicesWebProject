<?php
include "configuracion.php";
$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

# Una burda validacion para que si se entra directamente al php no se haga la insert
if (!empty($_POST['iEmail'])){
    if (empty($_FILES["image"]["type"])){
        $sql = "INSERT INTO $db.preguntas (email, enunciado, correcta, inco1, inco2, inco3, comp, tema) 
        VALUES ('".$_POST["iEmail"]."','".$_POST["iEnun"]."','".$_POST["iC"]."','".$_POST["iI1"]."',
            '".$_POST["iI2"]."','".$_POST["iI3"]."','".$_POST["iComp"]."','".$_POST["iTema"]."')";
    }else{
        $imagetmp=addslashes(file_get_contents($_FILES['image']['tmp_name']));

        $sql = "INSERT INTO $db.preguntas (email, enunciado, correcta, inco1, inco2, inco3, comp, tema, image) 
        VALUES ('".$_POST["iEmail"]."','".$_POST["iEnun"]."','".$_POST["iC"]."','".$_POST["iI1"]."',
            '".$_POST["iI2"]."','".$_POST["iI3"]."','".$_POST["iComp"]."','".$_POST["iTema"]."','".$imagetmp."')";
    }

}else $sql = "error inesperado";

if ($conn->query($sql) === TRUE) {
    #output buffering, mientras activo no se manda nada, se va almacenando
    #ob_start();
    $message = 'New record created successfully';
    header( 'Location: verpreguntasconfoto.php?message=' . $message);
    #ob_end_flush();

} else {
    echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}

$conn->close();
