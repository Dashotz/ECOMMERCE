// productpage.js

document.addEventListener('DOMContentLoaded', () => {
    const productsGrid = document.getElementById('products-grid');
    const prevPageButton = document.getElementById('prev-page');
    const nextPageButton = document.getElementById('next-page');
    let currentPage = 1;
    const productsPerPage = 9;
    const totalProducts = productsGrid.children.length;

    function displayProducts() {
        const start = (currentPage - 1) * productsPerPage;
        const end = start + productsPerPage;

        Array.from(productsGrid.children).forEach((product, index) => {
            product.style.display = (index >= start && index < end) ? 'block' : 'none';
        });

        prevPageButton.disabled = currentPage === 1;
        nextPageButton.disabled = end >= totalProducts;
    }

    prevPageButton.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            displayProducts();
        }
    });

    nextPageButton.addEventListener('click', () => {
        const totalPages = Math.ceil(totalProducts / productsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            displayProducts();
        }
    });

    // Initial display of products
    displayProducts();
});
