<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulario</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script type="text/javascript" src="js/comprobar.js"></script>-->
</head>
<body>
<!--action='prueba.php'-->
<form id='fpreguntas' name='fpreguntas' method='POST' enctype='multipart/form-data' action='registrar2.php'>
    Email*: <input type="text" name="email">                                <br>
    Nombre y apellidos*: <input type="nombre" name="nombre" >                         <br>
    Nick*: <input type="text" id="nick" name="nick" >   <br>
    Password*: <input type="text" id="pass1" name="pass1" >   <br>
    Repetir Password*: <input type="text" id="pass2" name="pass2">   <br>
    Insertar imagen (Max 64Kb): <input type="file" name="image" size="40" accept="image/*" onchange="loadFile(event)"> <br>
    <img id="output" align="center"/> <br>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            $('img#output').css({'width':'30%', 'height':'30%'});
        };
    </script>
    <input type="submit" id="btnSubmit" value="Submit Form">                                <br>

</form>

</body>
</html>