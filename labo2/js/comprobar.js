$(function(){

    $("#fpreguntas").on('submit', function (e) {

        var email = $('[name=iEmail]').val();
        var complejidad = $('[name=iComp]').val();
        var enunciado = $('[name=iEnun]').val();
        /*
        var $form = $(this);
        // Let's select and cache all the fields
        var $inputs = $form.find("iEmail, iEnun, iC, iI1");
        // Serialize the data in the form
        var serializedData = $form.serialize();
        $inputs.prop("disabled", true);
        // Para seguir con lo de php https://stackoverflow.com/questions/5004233/jquery-ajax-post-example-with-php
*/
        e.preventDefault();

        //stobal001@ikasle.ehu.es
        var regex = /([a-zA-Z])+([0-9]){3}\@ikasle\.ehu.(es|eus)/;
        if (regex.test(email) === false) return alert("Direccion incorrecta");

        if (complejidad < 1 || complejidad > 5 ) return alert("Complejidad insuficiente");

        if (enunciado.length < 10 ) return alert("Pregunta tiene menos de 10 caracteres");

        if(email == '' || enunciado == '' || $('#iC').val() == '' ||
            $('#iI1').val() == '' || $('#iI2').val() == '' || $('#iI3').val() == '' ||
            complejidad == '') return alert("Rellena campos con *");

        //Si llega aqui es que no ha tenido errores
        this.submit();

    });




});