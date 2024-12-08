<?php
session_start();
if (!isset($_SESSION['total_price'])) {
    echo "Erreur: Le montant total n'est pas disponible.";
    exit;
}

$total_price = $_SESSION['total_price'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - PizzaMania</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
:root {
    --primary-bg: #f7f9fc;
    --card-bg: #ffffff;
    --primary-color: #ff4d4f;
    --secondary-color: #ffc107;
    --text-color: #2a3e52;
    --border-color: #e4e8ed;
}


        body {
            background-color: var(--primary-bg);
            color: var(--text-color);
            font-family: 'Poppins', Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        }

        h1.heading {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 20px;
        }

        .summary {
            font-size: 1.2rem;
            line-height: 1.6;
            text-align: center;
            margin-bottom: 30px;
        }

        .summary span {
            font-weight: bold;
            color: var(--primary-color);
        }

        .btn-custom {
            background-color: var(--primary-color);
            color: white;
            font-size: 1rem;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            text-transform: uppercase;
            font-weight: 600;
            box-shadow: 0px 5px 15px rgba(255, 77, 79, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background-color: var(--secondary-color);
            box-shadow: 0px 8px 20px rgba(255, 193, 7, 0.4);
        }

        .paypal-button-container {
            margin-top: 40px;
            text-align: center;
        }

        .divider {
            margin: 20px 0;
            border-top: 2px solid var(--border-color);
        }

        footer {
            margin-top: 50px;
            text-align: center;
            font-size: 0.9rem;
            color: var(--text-color);
        }

        footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
    <script src="https://www.paypal.com/sdk/js?client-id=AURoClKTofgpvyisGertGKUDBCL8EeB_3z1ytZ3X6A9pndUHk9dKjIncdTTmL8-wn4XxW6hGxH3FRakG&currency=CAD"></script>
</head>
<body>

<div class="container">
    <h1 class="heading">Paiement Sécurisé</h1>

    <div class="paypal-button-container" id="paypal-button-container"></div>

    <div class="divider"></div>

    <div class="text-center">
        <button class="btn-custom" onclick="window.location.href='index.php'">Retour</button>
    </div>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total_price; ?>'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Merci ' + details.payer.name.given_name + '! Votre paiement a été effectué avec succès.');
                    window.location.href = "success.php?orderID=" + data.orderID;
                });
            },
            onError: function(err) {
                alert('Une erreur est survenue lors du paiement. Veuillez réessayer.');
            }
        }).render('#paypal-button-container');
    </script>
</div>

<footer>
    <p>© 2024 PizzaMania. Tous droits réservés. | <a href="#">Conditions d'utilisation</a> | <a href="#">Politique de confidentialité</a></p>
</footer>

</body>
</html>
