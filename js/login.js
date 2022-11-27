/*$.validator.setDefaults({
    submitHandler: function() {
        alert("enviado");
        window.location = "formulario.html"
    }
});*/


$(document).ready(function() {
    $('#signupForm').validate({
        rules: {
            uname: {
                required: true,
                email: true
            },

            psw: {
                required: true,
                minlength: 8

            },
            agree: "required"
        },
        messages: {

            uname: {
                required: "Por favor ingresa tu correo",
                email: "Por favor ingresa un correo válido"
            },

            psw: {
                required: "Por favor ingresa tu contraseña",
                minlength: "Por favor ingresa tu contraseña"
            }

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