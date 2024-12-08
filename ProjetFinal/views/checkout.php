<?php
require_once '../controllers/CartController.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PizzaMania - Paiement</title>
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
            color: white;
        }

        header .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        header .navbar-brand:hover {
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

        h1, h2 {
            text-align: center;
            color: var(--highlight-color);
        }

        .table th, .table td {
            color: var(--text-color);
            background-color: var(--secondary-color);
            border: 1px solid var(--border-color);
        }

        .table th {
            font-weight: bold;
        }

        .form-control {
            background-color: var(--secondary-color);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }

        .form-control:focus {
            background-color: var(--primary-color);
            color: var(--text-color);
            border-color: var(--highlight-color);
        }

        .btn-danger {
            background-color: var(--highlight-color);
            border: none;
        }

        .btn-danger:hover {
            background-color: var(--accent-color);
        }

        footer {
            background-color: var(--highlight-color);
            padding: 15px;
            text-align: center;
            color: white;
            margin-top: 50px;
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

        .total-amount-card {
            background-color: var(--highlight-color);
            color: white;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            margin-top: 40px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .total-amount-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .total-amount-card h4 {
            font-size: 2rem;
            font-weight: bold;
        }

        .total-amount-card .amount {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        .btn-danger {
            background-color: var(--highlight-color);
            border: none;
        }

        .btn-danger:hover {
            background-color: var(--accent-color);
        }

        .total-amount-card .btn {
            background-color: var(--accent-color);
            color: white;
            padding: 12px 40px;
            border-radius: 50px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .total-amount-card .btn:hover {
            background-color: var(--highlight-color);
            color: var(--text-color);
        }
    </style>
</head>
<body>
    <header>
        <a href="index.php" class="navbar-brand">PizzaMania</a>
        <div>
            <a href="cart.php" class="btn">Retour au panier</a>
        </div>
    </header>

    <div class="container mt-4">

        <div class="total-amount-card">
            <h4>Montant Total</h4>
            <div class="amount"><?php echo number_format($totalAmount, 2); ?> $</div>
        </div>

        <h2 class="mt-5"></h2>
        <form action="../controllers/OrderController.php?action=placeOrder" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nom Complet</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Ville</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Pays</label>
                <input type="text" name="country" id="country" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="zip" class="form-label">Code Postal</label>
                <input type="text" name="zip" id="zip" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-danger w-100 mt-3">Passer la commande</button>
        </form>
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
</body>
</html>
