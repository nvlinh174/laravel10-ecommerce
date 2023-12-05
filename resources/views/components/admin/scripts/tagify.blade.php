<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<script>
    const tagifyInputs = document.querySelectorAll(".input-tagify");

    if (tagifyInputs) {
        tagifyInputs.forEach((element) => {
            new Tagify(element);
        });
    }
</script>
