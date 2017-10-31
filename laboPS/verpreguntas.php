<?php
include "configuracion.php";
$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) echo "Fallo al conectar a MySQL" . $connection->connect_error;

$counter = 1;

$resultado = mysqli_query($connection, "SELECT * FROM preguntas ORDER BY id ASC");

# Creamos el mensaje que se nos pasa por get de que se ha creado una nueva file, y sino bronca
if (!empty($_GET["message"])) $message = $_GET["message"];
else $message = "No has entrado por donde debias";
echo '<script> alert("'.$message.'")</script>';

echo '<table border="0" style="text-align:center;" cellpadding="0" cellspacing="3"><tr>
                <td width="2%">Id</td>
                <td width="10%">Email</td>
                <td width="15%">Enunciado</td>
                <td width="10%">Correcta</td>
                <td width="10%">Incorrecta 1</td>
                <td width="10%">Incorrecta 2</td>
                <td width="10%">Incorrecta 3</td>
                <td width="2%">Comp</td>
                <td width="10%">Tema</td>              
                </tr>';

while( $row = mysqli_fetch_array( $resultado)){
    #print_r($row);
    echo '<tr class="tabla_datos">';
    for ($i=0;$i < $resultado->field_count - 1;$i++) echo '<td>'.$row[$i].'</td>';
    echo '</tr>';
}
echo '</table>';
mysqli_close($connection);
