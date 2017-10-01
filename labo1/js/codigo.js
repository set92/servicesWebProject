function comprobar(){
    var n1 = document.getElementById("num1").value;
    var n2 = document.getElementById("num2").value;
    var eResult = document.getElementById("expected_result").value;
    var opcion = document.getElementById("operaciones").value;

    var resu;
    switch(opcion){
        case '0': resu = Number(n1) + Number(n2);break;
        case '1': resu = Number(n1) - Number(n2);break;
        case '2': resu = Number(n1) * Number(n2);break;
        case '3': resu = Number(n1) / Number(n2);break;
        default:resu = Number(n1) + Number(n2);break;
    }

    if (Number(resu) === Number(eResult) ){
        document.getElementById("lblRespuesta").innerHTML = "Correcto"
    }else{
        document.getElementById("lblRespuesta").innerHTML = "Comprueba tus calculos"
    }
}