$(function(){
    $('#submit').click(function comprobar(){
        var n1 = $('#num1').val();
        var n2 = $('#num2').val();
        var eResult = $('#expected_result').val();
        var opcion = $('#operaciones').val();

        console.log(n1);

        var resu;
        switch(opcion){
            case '0': resu = Number(n1) + Number(n2);break;
            case '1': resu = Number(n1) - Number(n2);break;
            case '2': resu = Number(n1) * Number(n2);break;
            case '3': resu = Number(n1) / Number(n2);break;
            default:resu = Number(n1) + Number(n2);break;
        }

        if (Number(resu) === Number(eResult) ){
            $("#lblRespuesta").text("Correcto");
        }else{
            $("#lblRespuesta").text("Comprueba tus calculos");
        }



    });
});