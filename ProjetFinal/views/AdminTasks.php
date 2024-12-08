<?php
include_once '../controllers/OrderController.php';
include_once '../controllers/ProductController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tableau de Bord</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

body {
    font-family: 'Roboto', 'Arial', sans-serif;
    background-color: #f4f7fb; 
    color: #333;
    margin: 0;
    padding: 0;
    line-height: 1.6;
}

a {
    text-decoration: none;
    color: inherit;
}


.container-fullwidth {
    width: 100%;
    max-width: 1200px; 
    margin: 0 auto;
    padding: 0 20px; 
}


header {
    background-color: #e74c3c;
    color: #fff;
    padding: 20px 0;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
}

header .container-fullwidth {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header .navbar-brand {
    font-size: 30px;
    font-weight: 700;
    letter-spacing: 1px;
    display: flex;
    align-items: center;
}

header .navbar-brand i {
    margin-right: 15px;
}

header button {
    background-color: #fff;
    color: #e74c3c;
    border-radius: 30px;
    padding: 12px 30px;
    font-size: 16px;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
}

header button:hover {
    background-color: #ecf0f1;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

form {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
    padding: 40px;
    margin-top: 30px;
    margin-bottom: 30px;
}

form:hover {
    transform: scale(1.02);
}

form label {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    display: block;
    color: #444;
}

form input, form textarea {
    width: 100%;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    transition: border 0.3s ease, box-shadow 0.3s ease;
}

form input:focus, form textarea:focus {
    border-color: #e74c3c;
    box-shadow: 0px 0px 8px rgba(231, 76, 60, 0.3);
}

form button {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 15px 40px;
    border-radius: 30px;
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
}

form button:hover {
    background-color: #c0392b;
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
}

/* Table Styles */
table {
    width: 100%;
    margin-top: 40px;
    margin-bottom: 40px;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

table th, table td {
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid #f1f1f1;
}

table th {
    background-color: #e74c3c;
    color: white;
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
}

table td {
    font-size: 14px;
    color: #555;
    padding: 15px;
}

table img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

table img:hover {
    transform: scale(1.1);
}

table .btn-modify, table .btn-delete {
    padding: 10px 20px;
    margin: 5px;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

table .btn-modify {
    background-color: #3498db;
    color: white;
}

table .btn-modify:hover {
    background-color: #2980b9;
}

table .btn-delete {
    background-color: #e74c3c;
    color: white;
}

table .btn-delete:hover {
    background-color: #c0392b;
}

footer {
    background-color: #2c3e50;
    color: white;
    padding: 60px 0;
    font-size: 16px;
    box-shadow: 0px -6px 20px rgba(0, 0, 0, 0.1);
}

footer h5 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 20px;
    color: #e74c3c;
}

footer p, footer a {
    color: #bdc3c7;
    font-size: 14px;
}

footer a:hover {
    color: #e74c3c;
    text-decoration: underline;
}

footer .social-links a {
    font-size: 22px;
    margin: 0 15px;
    color: white;
    transition: color 0.3s ease;
}

footer .social-links a:hover {
    color: #e74c3c;
}

@media (max-width: 1024px) {
    header .navbar-brand {
        font-size: 26px;
    }

    header button {
        font-size: 14px;
        padding: 10px 20px;
    }

    form {
        padding: 30px;
    }

    table th, table td {
        padding: 12px;
    }

    footer h5 {
        font-size: 18px;
    }
}

@media (max-width: 768px) {
    header .container-fullwidth {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    form {
        padding: 20px;
    }

    table {
        font-size: 13px;
        margin-top: 20px;
    }

    footer {
        padding: 30px 0;
    }
}

@media (max-width: 576px) {
    header .navbar-brand {
        font-size: 22px;
    }

    table th, table td {
        padding: 10px;
    }

    form {
        padding: 15px;
    }

    footer h5 {
        font-size: 16px;
    }


.card {
    border-radius: 15px;
    overflow: hidden;
}

.card-body {
    padding: 25px;
}

.card-title {
    font-weight: 700;
    font-size: 20px;
    margin-bottom: 15px;
}

.display-4 {
    font-size: 2.5rem;
    font-weight: 600;
}

.text-muted {
    font-size: 14px;
    color: #7f8c8d;
}
    }
</style>
</head>
<body>
<header class="bg-danger text-white py-2 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="home.php" class="navbar-brand fs-3 fw-bold text-white text-decoration-none">
            <i class="fas fa-pizza-slice"></i> PizzaMania
        </a>
        <form action="../public/index.php?controller=auth&action=logout" method="POST">
            <button type="submit" class="btn btn-light btn-sm px-4">
                <i class="fas fa-sign-out-alt me-2"></i> Quitter Admin
            </button>
        </form>
    </div>
</header>

<div class="container">
    <h2></h2>
    <form action="../public/index.php?controller=product&action=<?php echo $productToEdit ? 'update' : 'addProduct'; ?>" method="POST" enctype="multipart/form-data">
        <?php if ($productToEdit) : ?>
            <input type="hidden" name="id" value="<?php echo $productToEdit['id']; ?>">
            <input type="hidden" name="current_image" value="<?php echo $productToEdit['image']; ?>">
        <?php endif; ?>

        <label for="name">Nom de la pizza :</label>
        <input type="text" name="name" value="<?php echo $productToEdit ? htmlspecialchars($productToEdit['name']) : ''; ?>" required>

        <label for="description">Description :</label>
        <textarea name="description" required><?php echo $productToEdit ? htmlspecialchars($productToEdit['description']) : ''; ?></textarea>

        <label for="image">Image :</label>
        <input type="file" name="image" accept="image/*">

        <label for="prix">Prix :</label>
        <input type="number" step="0.01" name="prix" value="<?php echo $productToEdit ? htmlspecialchars($productToEdit['prix']) : ''; ?>" required>

        <label for="category">Catégorie :</label>
        <input type="text" name="category" value="<?php echo $productToEdit ? htmlspecialchars($productToEdit['category']) : ''; ?>" required>

        <div class="btn-center">
            <button type="submit"><?php echo $productToEdit ? 'Mettre à jour' : 'Ajouter la Pizza'; ?></button>
        </div>
    </form>

    <h1></h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td><?php echo htmlspecialchars($product['description']); ?></td>
                        <td><img src="../images/<?php echo htmlspecialchars($product['image']); ?>" alt="Image"></td>
                        <td><?php echo htmlspecialchars($product['prix']); ?> $</td>
                        <td><?php echo htmlspecialchars($product['category']); ?></td>
                        <td>
                            <a href="AdminTasks.php?edit_id=<?php echo $product['id']; ?>" class="btn-modify">Modifier</a>
                            <a href="../public/index.php?controller=product&action=delete&id=<?php echo $product['id']; ?>" onclick="return confirm('Êtes-vous sûr ?');" class="btn-delete">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7">Aucune pizza trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h2></h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Status</th>
                <th>Montant Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orders)) : ?>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['placed_on']); ?></td>
                        <td><?php echo htmlspecialchars($order['name']); ?></td>
                        <td><?php echo htmlspecialchars($order['address']); ?></td>
                        <td><?php echo htmlspecialchars($order['status']); ?></td>
                        <td><?php echo number_format($order['total_amount'], 2); ?> $</td>
                        <td>
                            <a href="../controllers/OrderController.php?action=delete&id=<?php echo $order['id']; ?>" class="btn-delete">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Aucune commande trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="card-title">Nombre de Commandes</h5>
                    <p class="display-4" style="color: #e74c3c;"><?php echo count($orders); ?></p>
                    <small class="text-muted">Total des commandes effectuées</small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="card-title">Montant Total</h5>
                    <p class="display-4" style="color: #3498db;"><?php echo number_format(array_sum(array_column($orders, 'total_amount')), 2); ?> $</p>
                    <small class="text-muted">Total des revenus générés</small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded">
                <div class="card-body text-center">
                    <h5 class="card-title">Nombre de Produits</h5>
                    <p class="display-4" style="color: #2ecc71;"><?php echo count($products); ?></p>
                    <small class="text-muted">Total des produits disponibles</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h4 class="text-center mb-4">Évolution des Commandes</h4>
            <canvas id="orderChart"></canvas>
        </div>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const orderData = {
        labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin'],
        datasets: [{
            label: 'Commandes par mois',
            data: [15, 30, 45, 40, 55, 60],
            fill: false,
            borderColor: '#e74c3c',
            tension: 0.1
        }]
    };

    const config = {
        type: 'line',
        data: orderData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                },
            },
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const orderChart = new Chart(document.getElementById('orderChart'), config);
</script>

</body>
</html>
