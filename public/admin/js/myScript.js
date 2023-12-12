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
        elTarget.addEventListener("change", function () {
            const value = elTarget.value;
            fetch(`/utility/generate-slug?value=${value}`)
                .then((response) => response.json())
                .then((res) => {
                    elInputSlug.value = res.slug;
                });
        });
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

const elNestedSortable = document.getElementById("nested-sortable");
if (elNestedSortable) {
    const nestedSortables = document.querySelectorAll(".nested-sortable");
    const sortables = [];
    for (let i = 0; i < nestedSortables.length; i++) {
        sortables[i] = new Sortable(nestedSortables[i], {
            group: "nested",
            animation: 150,
            fallbackOnBody: true,
            swapThreshold: 0.65,
            dataIdAttr: "data-id",
            onEnd: function (evt) {
                const items = elNestedSortable.children;

                const mappingData = (item) => {
                    const elChildsWrapper =
                        item.querySelector(".nested-sortable");
                    const children = Array.from(elChildsWrapper.children).map(
                        mappingData
                    );
                    const id = parseInt(item.dataset.id);
                    return { id, children };
                };

                const tree = Array.from(items).map(mappingData);
                const jsonTree = JSON.stringify(tree);
                const token = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");

                fetch(`/admin/categories/rebuildTree`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": token,
                    },
                    body: JSON.stringify({ data: jsonTree }),
                }).then((response) => response.json());

                console.log(tree);
            },
        });
    }
}
