
    let togglePassword = document.getElementById('toggle-password');
    let togglePassword1 = document.getElementById('toggle-password1');
    let password = document.getElementById('password');
    let password1 = document.getElementById('password1');

        togglePassword.onchange = function () {
            if (document.getElementById('toggle-password').checked) {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
        
        togglePassword1.onchange = function () {
            if (document.getElementById('toggle-password1').checked) {
                password1.type = "text";
            } else {
                password1.type = "password";
            }
        }
