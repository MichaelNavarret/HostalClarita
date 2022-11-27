$.validator.setDefaults({
    submitHandler: function() {
        alert("enviado");
    }
});


$(document).ready(function() {
    $('#signupForm').validate({
        rules: {
            NombreCompleto: {
                required: true,
                minlength: 5
            },
            Email: {
                required: true,
                minlength: 5
            },
            Direccion: {
                required: true,

            },
            Ciudad: {
                required: true,


            },
            Comuna: {
                required: true,

            },
            CodigoPostal: {
                required: true,
                minlength: 4
            },
            TitularTarjeta: {
                required: true,
                minlength: 5
            },
            Nrotarjeta: {
                required: true,
                minlength: 16
            },
            Mesdecaducidad: {
                required: true,
                minlength: 2
            },
            Añodecaducidad: {
                required: true,
                minlength: 4
            },
            CVV: {
                required: true,
                minlength: 3
            },
            agree: "required"
        },
        messages: {
            NombreCompleto: {
                required: "Por favor ingresa tu nombre completo",
                minlength: "Tu nombre debe ser de no menos de 5 caracteres"
            },
            Email: "Por favor ingresa un correo válido",

            TitularTarjeta: {
                required: "Por favor ingresa tu nombre y apellido",
                minlength: "Tu nombre debe ser de no menos de 5 caracteres"
            },
            Nrotarjeta: {
                required: "Ingrese su numero de tarjeta",
                minlength: "El número de tarjeta no tiene los caracteres necesarios"
            },
            Mesdecaducidad: {
                required: "Ingrese el mes de vencimineto de su tarjeta en numeros",
                minlength: "Deben ser 2 caracteres como minimo"
            },
            Añodecaducidad: {
                required: "Ingrese la fecha de vencimiento de su tarjeta",
                minlength: "El formato de fecha no es correcto"
            },
            Direccion: {
                required: "Ingrese la direccion donde recide",
            },
            Comuna: {
                required: "Ingrese su Comuna",
            },
            Ciudad: {
                required: "Ingrese su Ciudad",
            },
            CodigoPostal: {
                required: "Ingrese el Codigo Postal",
                minlength: "El codigo postal debe contener como minimo 4 digitos"
            },
            CVV: {
                required: "Ingrese el Codigo de seguridad",
                minlength: "El CVV debe contener como minimo 3 digitos"
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