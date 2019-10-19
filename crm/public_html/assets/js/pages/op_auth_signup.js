/*
 *  Document   : op_auth_signup.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign Up Page
 */

var OpAuthSignUp = function() {
    // Init Sign Up Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationSignUp = function(){
        jQuery('.js-validation-signup').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
            rules: {
                'signup-ln': {
                    required: true,
                    minlength: 3
                },
                'signup-email': {
                    required: true,
                    email: true
                },
                'signup-password': {
                    required: true,
                    minlength: 5
                },
                'signup-password-confirm': {
                    required: true,
                    equalTo: '#signup-password'
                },
                'signup-terms': {
                    required: true
                }
            },
            messages: {
                'signup-fn': {
                    required: 'Введите имя',
                    minlength: 'Имя должно иметь минимум 3 символа'
                },
                'signup-email': 'Пожалуйста введите корректный email',
                'signup-password': {
                    required: 'Введите пароль!',
                    minlength: 'Ваш пароль менее 5 символов!'
                },
                'signup-password-confirm': {
                    required: 'Пожалуйста проверьте пароль!',
                    minlength: 'Пароль должен быть длинее 5 символов!',
                    equalTo: 'Повторите пароль'
                },
                'signup-terms': 'Вы должны принять политику!'
            }
        });
    };

    return {
        init: function () {
            // Init SignUp Form Validation
            initValidationSignUp();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ OpAuthSignUp.init(); });