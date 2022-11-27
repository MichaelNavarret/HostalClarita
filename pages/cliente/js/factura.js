$.validator.setDefaults({
    submitHandler: function() {
        alert("enviado");
    }
});


$(document).ready(function() {
    $('#signupForm').validate({
        rules: {
            Nombre: {
                required: true,
                minlength: 5
            },
            NombreEmpresa: {
                required: true,
                minlength: 5

            },
            Ciudad: {
                required: true,

            },
            CorreoElectronicoEmpresa: {
                required: true,
                minlength: 5
            },
            DireccionEmpresa: {
                required: true,

            },
            RutEmpresa: {
                required: true,
                minlength: 8
            },
            CodigoPostal: {
                required: true,
                minlength: 4
            },
            TelefonoEmpresa: {
                required: true,
                minlength: 9
            },
            agree: "required"
        },
        messages: {
            Nombre: {
                required: "Por favor ingresa tu nombre completo",
                minlength: "Tu nombre debe ser de no menos de 5 caracteres"
            },
            NombreEmpresa: {
                required: "Por favor ingresa el nombre de la empresa",
                minlength: "Tu nombre debe ser de no menos de 5 caracteres"

            },
            Ciudad: {
                required: "Por favor ingrese su ciudad",
                
            },
            CorreoElectronicoEmpresa: "Por favor ingresa un correo válido",
            DireccionEmpresa: {
                required: "Ingrese la direccion donde recide",
            },
            RutEmpresa: {
                required: "Por favor ingresa un rut válido",
                minlength: "Tu rut debe ser de no menos de 8 digitos de longitud"
            },
            CodigoPostal: {
                required: "Ingrese el Codigo Postal",
                minlength: "El codigo postal debe contener como minimo 4 digitos"
            },
            TelefonoEmpresa: {
                required: "Por favor ingresa un número valido",
                minlength: "Tu número debe ser de no menos de 9 digitos de longitud"
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