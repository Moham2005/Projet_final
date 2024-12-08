<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: Userlogin.php");
    exit();
}
include "../controllers/ProductController.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Pizzas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #ffe5b4; 
            --secondary-color: #f8d7a1; 
            --highlight-color: #e63946; 
            --accent-color: #f4a261; 
            --text-color: #2a363b; 
            --border-color: #e4c7a3; 
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--primary-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }

        header {
            background-color: var(--highlight-color);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        header .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
        }

        header .navbar-brand:hover {
            text-decoration: none;
            color: var(--accent-color);
        }

        header .cart-icon {
            font-size: 1.5rem;
            color: white;
            margin-right: 15px;
        }

        header .cart-icon:hover {
            color: var(--accent-color);
        }

        header .btn {
            background-color: white;
            color: var(--highlight-color);
            font-weight: bold;
            border-radius: 5px;
            padding: 8px 20px;
            transition: background-color 0.3s ease;
        }

        header .btn:hover {
            background-color: var(--accent-color);
            color: white;
        }

        h2 {
            text-align: center;
            color: var(--highlight-color);
            margin: 20px 0;
        }

        .product-card {
            background-color: var(--secondary-color);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
        }

        .product-card img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .product-card .product-info {
            padding: 15px;
        }

        .product-card .product-info h5 {
            color: var(--highlight-color);
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .product-card .product-info p {
            margin: 5px 0;
        }

        .product-card .btn {
            margin-top: 10px;
            background-color: var(--highlight-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .product-card .btn:hover {
            background-color: var(--accent-color);
        }

        footer {
            background-color: var(--highlight-color);
            padding: 15px;
            text-align: center;
            color: white;
        }

        footer a {
            color: white;
            margin: 0 10px;
            font-size: 1.2rem;
            text-decoration: none;
        }

        footer a:hover {
            color: var(--accent-color);
        }

        .filter-form {
            background-color: var(--secondary-color);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .filter-form input, .filter-form select {
            background-color: var(--primary-color);
            color: var(--text-color);
            border: 1px solid var(--border-color);
            padding: 10px;
            border-radius: 5px;
        }

        .filter-form button {
            background-color: var(--highlight-color);
            color: white;
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .filter-form button:hover {
            background-color: var(--accent-color);
        }
    </style>
</head>
<body>
<header>
    <div class="container d-flex justify-content-between align-items-center py-3">
        <a href="home.php" class="navbar-brand fs-3 fw-bold text-white text-decoration-none">
            <i class="fas fa-pizza-slice"></i> PizzaMania
        </a>
        
        <div class="d-flex align-items-center gap-3">
            <a href="cart.php" class="btn btn-outline-primary">Panier</a>
            
            <form action="../public/index.php?controller=auth&action=logout" method="POST" style="display: inline;">
                <button type="submit" class="btn btn-outline-danger">Déconnexion</button>
            </form>
        </div>
    </div>
</header>


    <div class="container">
        <h2></h2>

        <div class="d-flex justify-content-center mb-4">
            <form method="GET" class="filter-form d-flex">
                <select name="category">
                    <option value="">Toutes les catégories</option>
                    <option value="Margarita" <?php if ($category === 'Margarita') echo 'selected'; ?>>Margarita</option>
                    <option value="Pepperoni" <?php if ($category === 'Pepperoni') echo 'selected'; ?>>Pepperoni</option>
                    <option value="Vegetarienne" <?php if ($category === 'Vegetarienne') echo 'selected'; ?>>Végétarienne</option>
                    <option value="Quatre Fromages" <?php if ($category === 'Quatre Fromages') echo 'selected'; ?>>Quatre Fromages</option>
                </select>
                <button type="submit" class="btn">Filtrer</button>
            </form>
        </div>

        <div class="row">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="col-md-4">
                        <div class="product-card">
                            <img src="../images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="product-info">
                                <h5><?php echo htmlspecialchars($product['name']); ?></h5>
                                <p><?php echo htmlspecialchars($product['description']); ?></p>
                                <p><strong>Prix :</strong> <?php echo htmlspecialchars($product['prix']); ?> $</p>
                                <p><strong>Catégorie :</strong> <?php echo htmlspecialchars($product['category']); ?></p>
                                <button class="btn add-to-cart"
                                    data-id="<?php echo $product['id']; ?>"
                                    data-name="<?php echo htmlspecialchars($product['name']); ?>"
                                    data-description="<?php echo htmlspecialchars($product['description']); ?>"
                                    data-image="<?php echo htmlspecialchars($product['image']); ?>"
                                    data-price="<?php echo $product['prix']; ?>"
                                    data-category="<?php echo htmlspecialchars($product['category']); ?>">
                                    Ajouter au Panier
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center">Aucune pizza trouvée pour ces critères.</p>
            <?php endif; ?>
        </div>
    </div>

<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>À propos de nous</h5>
                <p class="small">
                    PizzaMania est votre destination de confiance pour savourer les meilleures pizzas artisanales, 
                    préparées avec des ingrédients frais et de qualité. Venez découvrir nos spécialités !
                </p>
            </div>

            <div class="col-md-4">
                <h5>Liens rapides</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Accueil</a></li>
                    <li><a href="./menu.php" class="text-white text-decoration-none">Notre Menu</a></li>
                    <li><a href="./contact.php" class="text-white text-decoration-none">Nous Contacter</a></li>
                    <li><a href="./inscriptions.php" class="text-white text-decoration-none">Créer un compte</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5>Nous contacter</h5>
                <p class="small mb-2"><i class="fas fa-map-marker-alt"></i> 123 Rue de la Pizzéria, Paris, France</p>
                <p class="small mb-2"><i class="fas fa-phone-alt"></i> +33 1 23 45 67 89</p>
                <p class="small mb-2"><i class="fas fa-envelope"></i> contact@pizzamania.fr</p>
            </div>
        </div>
        <hr class="bg-light">

        <div class="d-flex justify-content-between align-items-center">
            <div>
                <p class="mb-0">© 2024 PizzaMania. Tous droits réservés.</p>
            </div>
            <div class="social-links">
                <a href="#" class="text-white mx-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', () => {
                const product = {
                    product_id: button.getAttribute('data-id'),
                    product_name: button.getAttribute('data-name'),
                    product_description: button.getAttribute('data-description'),
                    product_image: button.getAttribute('data-image'),
                    product_price: button.getAttribute('data-price'),
                    product_category: button.getAttribute('data-category'),
                    quantity: 1
                };

                fetch('../controllers/CartController.php?action=addToCart', {
                    method: 'POST',
                    body: JSON.stringify(product),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).catch(error => console.error('Erreur :', error));
            });
        });
    </script>
</body>
</html>
