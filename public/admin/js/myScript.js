const passwordToggleIcon = document.querySelectorAll(
    'input[type="password"] + .input-icon-addon'
);

if (passwordToggleIcon.length > 0) {
    passwordToggleIcon.forEach((element) => {
        element.addEventListener("click", function () {
            const elInputPassword = element.previousElementSibling;
            if (elInputPassword) {
                const inputType = elInputPassword.type;
                if (inputType === "password") {
                    elInputPassword.type = "text";
                } else if (inputType === "text") {
                    elInputPassword.type = "password";
                }
            }
        });
    });
}
