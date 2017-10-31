<?php
include "configuracion.php";
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$email=$_POST["iEmail"];
$enunciado=$_POST["iEnun"];
$correcta=$_POST["iC"];
$inco1=$_POST["iI1"];
$inco2=$_POST["iI2"];
$inco3=$_POST["iI3"];
$comp=$_POST["iComp"];
$tema=$_POST["iTema"];

if (!empty($email) && !empty($enunciado) && !empty($correcta) && !empty($inco1) && !empty($inco2) &&
    !empty($inco3) && !empty($comp) && !empty($tema) &&
    preg_match('/^[1-5]$/', $comp) &&
    preg_match('/^[a-z]+[0-9]{3}\@ikasle\.ehu\.(es|eus)/', $email))
    $sql = "INSERT INTO $db.preguntas (email, enunciado, correcta, inco1, inco2, inco3, comp, tema) 
    VALUES ('".$email."','".$enunciado."','".$correcta."','".$inco1."',
        '".$inco2."','".$inco3."','".$comp."','".$tema."')";
else $sql = "error inesperado";

if ($conn->query($sql) === TRUE) {
    #output buffering, mientras activo no se manda nada, se va almacenando
    #ob_start();
    $message = 'New record created successfully';
    header( 'Location: verpreguntas.php?message=' . $message);
    #ob_end_flush();

} else {
    echo "<script type= 'text/javascript'>alert('Error: " . $sql . "');</script>";
}

$conn->close();
