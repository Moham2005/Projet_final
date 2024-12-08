<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur - PizzaMania</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #ffe5b4;
            --secondary-color: #f8d7a1;
            --highlight-color: #e63946;
            --accent-color: #f4a261;
            --text-color: #2a363b;
            --input-bg: #f7f3e9;
            --input-border: #e4c7a3;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--primary-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: var(--secondary-color);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: var(--highlight-color);
            font-weight: bold;
            margin-bottom: 20px;
        }

        .message {
            color: #e63946;
            margin: 10px 0;
            font-size: 0.9rem;
        }

        label {
            font-weight: bold;
            display: block;
            text-align: left;
            margin: 15px 0 5px;
            color: var(--text-color);
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            background-color: var(--input-bg);
            color: var(--text-color);
            border: 1px solid var(--input-border);
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="email"]:focus, input[type="password"]:focus {
            border-color: var(--highlight-color);
            box-shadow: 0 0 5px var(--highlight-color);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: var(--accent-color);
            color: var(--text-color);
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: var(--highlight-color);
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Administrateur</h2>

        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo "<p class='message'>" . htmlspecialchars($_SESSION['error']) . "</p>";
            unset($_SESSION['error']);
        }
        ?>

        <form action="../public/index.php?controller=auth&action=loginAdmin" method="POST">
            <label for="email">Adresse E-mail :</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
            
            <label for="password">Mot de Passe :</label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            
            <button type="submit">Connexion</button>
        </form>
        
        <a href="home.php" class="btn btn-secondary mt-3 w-100">Retour à l'accueil</a>
    </div>
</body>
</html>