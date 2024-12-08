<?php
include "../controllers/ProductController.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PizzaMania - Votre Pizzeria Préférée</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
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
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--primary-color);
            color: var(--text-color);
        }

        header {
            background-color: var(--highlight-color);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        header .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
            color: white;
        }
        header .nav-link {
            color: white;
            font-size: 1rem;
            font-weight: 500;
            margin-right: 15px;
            transition: color 0.3s ease;
        }
        header .nav-link:hover {
            color: var(--accent-color);
        }
        header .btn {
            background-color: white;
            color: var(--highlight-color);
            font-weight: bold;
            border-radius: 25px;
            padding: 8px 25px;
            transition: all 0.3s ease;
        }
        header .btn:hover {
            background-color: var(--accent-color);
            color: white;
        }

        .hero {
            background: url('https://source.unsplash.com/1600x900/?pizza') no-repeat center center/cover;
            height: 210px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            color: white;
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.5);
        }
        .hero h1 {
            font-size: 2.8rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: var(--accent-color);
        }
        .hero p {
            font-size: 1.2rem;
            font-weight: 400;
            margin-top: 10px;
        }

        .products-section {
            padding: 50px 15px;
            background-color: var(--primary-color);
        }
        .products-section h3 {
            text-align: center;
            margin-bottom: 40px;
            font-weight: bold;
            color: var(--highlight-color);
        }
        .card {
            border: none;
            border-radius: 15px;
            background-color: var(--secondary-color);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }
        .card img {
            height: 250px;
            object-fit: cover;
            border-bottom: 3px solid var(--accent-color);
        }
        .card-body {
            padding: 20px;
            text-align: center;
        }
        .card-title {
            font-size: 1.4rem;
            font-weight: bold;
            color: var(--highlight-color);
        }
        .card-text {
            font-size: 1rem;
            color: var(--text-color);
        }
        .btn-buy {
            background-color: var(--highlight-color);
            color: white;
            font-weight: bold;
            border-radius: 25px;
            padding: 10px 25px;
            transition: all 0.3s ease;
        }
        .btn-buy:hover {
            background-color: var(--accent-color);
        }

        footer {
            background-color: var(--highlight-color);
            padding: 30px 0;
            text-align: center;
            color: white;
        }
        footer .social-links a {
            color: white;
            font-size: 1.5rem;
            margin: 0 15px;
            transition: color 0.3s ease;
        }
        footer .social-links a:hover {
            color: var(--accent-color);
        }

        footer .credit {
            margin-top: 15px;
            font-size: 0.9rem;
            font-weight: 400;
        }
    </style>
</head>
<body>
    <header>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
        <a href="home.php" class="navbar-brand fs-3 fw-bold text-white text-decoration-none">
            <i class="fas fa-pizza-slice"></i> PizzaMania
        </a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav d-flex align-items-center gap-3">
                    <li class="nav-item">
                        <a href="./Userlogin.php" class="btn">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a href="./Register.php" class="btn">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a href="./Adminlogin.php" class="btn">ConnexionAdmin</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>


    <div class="products-section container">
        <h3></h3>
        <div class="row">
            <?php if (!empty($productsUnder40)) : ?>
                <?php foreach ($productsUnder40 as $product) : ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <img src="../images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                                <p class="card-text"><strong>Prix :</strong> <?php echo htmlspecialchars($product['prix']); ?> $</p>
                                <a href="#" class="btn btn-buy">Commander</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center">Aucune pizza disponible pour le moment.</p>
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
                    <li><a href="./Register.php" class="text-white text-decoration-none">Créer un compte</a></li>
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
