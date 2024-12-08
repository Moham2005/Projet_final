<?php
require_once '../controllers/CartController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Panier - PizzaMania</title>
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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: var(--highlight-color);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .navbar-brand i {
            font-size: 2rem;
            color: var(--accent-color);
        }

        .navbar-brand:hover {
            color: var(--accent-color);
        }

        h1 {
            color: var(--highlight-color);
            text-align: center;
            margin: 20px 0;
        }

        .table {
            color: var(--text-color);
            background-color: var(--secondary-color);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .table img {
            border-radius: 8px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            font-size: 1rem;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            padding: 5px;
            appearance: textfield;
        }

        .quantity-input::-webkit-inner-spin-button {
            display: inline;
        }

        .remove-item {
            font-size: 1rem;
            padding: 5px 10px;
            transition: all 0.3s ease;
        }

        .remove-item:hover {
            color: white;
            background-color: var(--highlight-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: var(--highlight-color);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--accent-color);
        }

        .btn-center {
            display: block;
            margin: 30px auto 20px auto;
            text-align: center;
        }

        footer {
            text-align: center;
            margin-top: auto;
            padding: 15px;
            background-color: var(--highlight-color);
            color: white;
        }

        footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            color: var(--accent-color);
        }
    </style>
</head>
<body>
    <header>
        <a href="home.php" class="navbar-brand">
            <i class="fas fa-pizza-slice"></i> PizzaMania
        </a>
        <div>
            <a href="index.php" class="btn btn-secondary">Retour au menu</a>
        </div>
    </header>

    <div class="container">
        <h1>Votre Panier</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pizza</th>
                    <th>Description</th>
                    <th>Prix unité</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($cartItems)) : ?>
                    <?php foreach ($cartItems as $item) : ?>
                        <tr data-id="<?php echo $item['id']; ?>">
                            <td>
                                <img src="../images/<?php echo htmlspecialchars($item['product_image']); ?>" width="60" alt="Produit">
                                <?php echo htmlspecialchars($item['product_name']); ?>
                            </td>
                            <td><?php echo htmlspecialchars($item['product_description']); ?></td>
                            <td><?php echo number_format($item['product_price'], 2); ?> $</td>
                            <td>
                                <div class="quantity-controls">
                                    <input type="number" class="quantity-input" data-cart-id="<?php echo $item['id']; ?>" value="<?php echo $item['quantity']; ?>" min="1" step="1">
                                </div>
                            </td>
                            <td class="total-price"><?php echo number_format($item['product_price'] * $item['quantity'], 2); ?> $</td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm remove-item" data-cart-id="<?php echo $item['id']; ?>">Annuler</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">Votre panier est vide.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="checkout.php" class="btn btn-primary btn-center">Passer à la commande</a>
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

    <script>
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', () => {
                const cartId = input.getAttribute('data-cart-id');
                const row = document.querySelector(`tr[data-id="${cartId}"]`);
                let quantity = parseInt(input.value);

                if (quantity >= 1) {
                    updateQuantity(cartId, quantity, row);
                } else {
                    input.value = 1;
                }
            });
        });

        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', () => {
                const cartId = button.getAttribute('data-cart-id');
                fetch('../controllers/CartController.php?action=removeFromCart', {
                    method: 'POST',
                    body: JSON.stringify({ cart_id: cartId }),
                    headers: { 'Content-Type': 'application/json' }
                }).then(response => response.json())
                  .then(data => {
                      if (data.success) {
                          const row = document.querySelector(`tr[data-id="${cartId}"]`);
                          row.remove();
                      } else {
                          alert(data.error);
                      }
                  })
                  .catch(error => console.error('Erreur :', error));
            });
        });

        function updateQuantity(cartId, quantity, row) {
            fetch('../controllers/CartController.php?action=updateQuantity', {
                method: 'POST',
                body: JSON.stringify({ cart_id: cartId, quantity: quantity }),
                headers: { 'Content-Type': 'application/json' }
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      const price = parseFloat(row.querySelector('td:nth-child(3)').textContent);
                      row.querySelector('.total-price').textContent = (price * quantity).toFixed(2) + ' $';
                  } else {
                      alert(data.error);
                  }
              })
              .catch(error => console.error('Erreur :', error));
        }
    </script>
</body>
</html>
