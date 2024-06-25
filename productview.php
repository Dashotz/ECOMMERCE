<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Shoppe - Product</title>
    <link rel="stylesheet" href="css/productview.css">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body>
    <!-- Header Section -->
    <header>
    <section class="header">
     <?php include("inc/nav.php"); ?>     
    </section>
    </header>
    
    <!-- Main Content -->
    <main>
        <div class="breadcrumb">
            <a href="#">Home</a> > <a href="#">Food</a> > <a href="#">Dry Food</a> > <span>Product Name</span>
        </div>
        <div class="product-detail-container">
            <div class="product-image-container">
                <div class="main-image"></div>
                <div class="thumbnail-images">
                    <div class="thumbnail"></div>
                    <div class="thumbnail"></div>
                    <div class="thumbnail"></div>
                </div>
            </div>
            <div class="product-info">
                <h2>Product Name</h2>
                <p class="product-rating">⭐⭐⭐⭐ 4.5/5</p>
                <p class="product-price">$260 <span class="original-price">$300</span> <span class="discount">-40%</span></p>
                <p class="product-description">Description. Consectetur adipiscing elit. Proin neque elit, elementum id dui et, lobortis euismod sapien. Integer vulputate ipsum non lectus feugiat tincidunt.</p>
                <div class="product-options">
                    <div class="flavors">
                        <span>Flavor:</span>
                        <button class="flavor-option" data-flavor="Plain">Plain</button>
                        <button class="flavor-option" data-flavor="Special">Special</button>
                    </div>
                    <div class="sizes">
                        <span>Size:</span>
                        <button class="size-option" data-size="Small">Small</button>
                        <button class="size-option" data-size="Medium">Medium</button>
                        <button class="size-option" data-size="Large">Large</button>
                        <button class="size-option" data-size="XL">XL</button>
                    </div>
                </div>
                <div class="quantity-selector">
                    <button class="quantity-button" onclick="decreaseQuantity()">-</button>
                    <input type="text" id="quantity" value="1" readonly>
                    <button class="quantity-button" onclick="increaseQuantity()">+</button>
                </div>
                <button id="add-to-cart-button" class="add-to-cart-button">Add to Cart</button>
            </div>
        </div>
        <div class="product-details">
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-button">About This Item</button>
                    <div class="accordion-content">
                        <p>About this item details...</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button">Details</button>
                    <div class="accordion-content">
                        <p>Details about the product...</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button">Nutritional Information</button>
                    <div class="accordion-content">
                        <p>Nutritional information...</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-button">Feeding Instruction</button>
                    <div class="accordion-content">
                        <p>Feeding instructions...</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/productview.js"></script>
</body>
</html>
