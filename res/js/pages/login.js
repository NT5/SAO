$(document).ready(function () {
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
                url: "./api/user/getUserByName",
                data: {
                    'name': username
                },
                success: function (data) {
                    console.group("%c getUserByName response", 'color: orange;');
                    console.table(data);
                    console.groupEnd();

                    if (data.error) {
                        M.toast({html: `<span><i class="material-icons">warning</i> ¡El usuario ${username} no existe!</span>`});
                        $("#username").removeClass("valid").addClass("invalid");
                    } else {
                        var user = data.user;
                        if (user.type === 0) {
                            M.toast({html: `<span><i class="material-icons">info</i> ¡El usuario ${user.name} aun no esta validado!</span>`});
                            $("#username").removeClass("valid").addClass("invalid");
                        } else {
                            $("#username").removeClass("invalid").addClass("valid");
                        }
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

    $(".login-form").validate({
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
            }
        },
        messages: {
            username: {
                required: "Ingresa tu nombre de usuario",
                hasClass: "Comprueba tu nombre de usuario",
                minlength: "El nombre de usuario tiene que tener 3 caracteres o mas"
            },
            password: {
                required: "Ingresa una contraseña valida"
            }
        }
    });
});

