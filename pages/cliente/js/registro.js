$(document).ready(function() {
    $('#signupForm').validate({
        rules: {
            name: {
                required: true,
                minlength: 5
            },

            pass: {
                required: true,
                minlength: 8

            },
            email: {
                required: true,
                email: true
            },

            number: {
                required: true,
                minlength: 9
            },
            rut: {
                required: true,
                minlength: 8
            },
            agree: "required"
        },
        messages: {

            name: {
                required: "Por favor ingresa tu nombre completo",
                minlength: "Tu nombre debe ser de no menos de 5 caracteres"
            },

            email: "Por favor ingresa un correo válido",
            pass: {
                required: "Por favor ingresa tu contraseña",
                minlength: "Tu contraseña debe ser de almenos de 8 caracteres"
            },
            number: {
                required: "Por favor ingresa un número valido",
                minlength: "Tu número debe ser de no menos de 9 digitos de longitud"
            },
            rut: {
                required: "Por favor ingresa un rut valido",
                minlength: "Tu rut debe ser de no menos de 8 digitos de longitud"
            },

        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-10").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents(".col-sm-10").addClass("has-success").removeClass("has-error");
        }
    });
});