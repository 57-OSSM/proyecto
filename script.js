document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('searchInput');
    const brandsList = document.getElementById('brandsList').getElementsByTagName('li');

    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toLowerCase();

        Array.from(brandsList).forEach(function(brand) {
            const brandName = brand.textContent.toLowerCase();
            if (brandName.includes(filter)) {
                brand.style.display = 'block';
            } else {
                brand.style.display = 'none';
            }
        });
    });
});