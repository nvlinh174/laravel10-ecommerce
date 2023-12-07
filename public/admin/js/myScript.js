// Toggle show password
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

// Generate Slug
const elInputSlug = document.querySelector(".slug");
if (elInputSlug) {
    const target = elInputSlug.dataset.target;
    const elTarget = document.querySelector(`[name="${target}"]`);
    if (elTarget) {
        elTarget.addEventListener('change', function () {
            fetch('')
        })
    }
}

document.addEventListener("click", function (e) {
    const el = e.target;

    if (el.classList.contains("btnDelete")) {
        e.preventDefault();
        if (confirm("Bạn chắc chắn muốn xóa dữ liệu này?"))
            el.firstElementChild.submit();
    }
});
