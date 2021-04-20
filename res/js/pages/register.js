$(document).ready(function () {
    // Password check
    $("#password").on("focusout", function (e) {
        if ($(this).val() !== $("#password_confirm").val()) {
            $("#password_confirm").removeClass("valid").addClass("invalid");
        } else {
            $("#password_confirm").removeClass("invalid").addClass("valid");
        }
    });

    $("#password_confirm").on("keyup", function (e) {
        if ($("#password").val() !== $(this).val()) {
            $(this).removeClass("valid").addClass("invalid");
        } else {
            $(this).removeClass("invalid").addClass("valid");
        }
    });
    // End password

    // Username check
    $("#username").on("focusout", function (e) {
        var username = $(this).val();
        if (username.length <= 2) {
            M.toast({html: `<span><i class="material-icons">info</i> El nombre de usuario tiene que tener 3 caracteres o mas</span>`});
            $("#username").removeClass("valid").addClass("invalid");
        } else {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "./api/user/checkUser",
                data: {
                    'name': username
                },
                success: function (data) {
                    console.group("%c checkUser response", 'color: orange;');
                    console.table(data);
                    console.groupEnd();

                    var user = data.user;
                    if (user.exist) {
                        M.toast({html: `<span><i class="material-icons">warning</i> El usuario ${user.name} ya existe!</span>`});
                        $("#username").removeClass("valid").addClass("invalid");
                    } else {
                        $("#username").removeClass("invalid").addClass("valid");
                    }
                }
            });
        }
    });

    function validatehasClass(value, element, param) {
        // console.log({value, element, param});
        return $(element).hasClass(param);
    }
    jQuery.validator.addMethod("hasClass", validatehasClass, "No valid class found");

    $("#registerForm").validate({
        onkeyup: false,
        onclick: false,
        onfocusout: false,
        showErrors: function (errorMap, errorList) {
            console.group('%c showErrors', 'color: blue;');
            console.table(errorMap);
            console.table(errorList);
            console.groupEnd();

            $.each(errorMap, function (key, message) {
                M.toast({html: `<span><i class="material-icons">warning</i> ${message}</span>`, classes: 'rounded', displayLength: 3000});
            });
        },
        rules: {
            username: {
                required: true,
                hasClass: 'valid',
                minlength: 3
            },
            password: {
                required: true
            },
            password_confirm: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            username: {
                required: "Ingresa tu nombre de usuario",
                hasClass: "El nombre de usuario ya esta en uso",
                minlength: "El nombre de usuario tiene que tener 3 caracteres o mas"
            },
            password: {
                required: "Ingresa una contraseña valida"
            },
            password_confirm: {
                required: "Repite la contraseña",
                equalTo: "Las contraseñas no son iguales"
            }
        },
        submitHandler: function (form) {
            $.ajax({
                url: '/api/user/registerUser',
                type: 'POST',
                data: $(form).serialize(),
                datatype: 'json',
                success: function (response) {
                    console.group("%c registerUser response", 'color: red;');
                    console.log(response);
                    console.groupEnd();

                    var res = response.register;
                    if (res.state === 1) {
                        $('#registerForm').slideUp();
                        $('#registerComplete').slideDown();
                    } else {
                        M.toast({html: `<span><i class="material-icons">warning</i> No se pudo registrar el usuario</span>`, classes: 'rounded', displayLength: 3000});
                    }
                }
            });
        }
    });
});