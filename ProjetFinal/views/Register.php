<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - PizzaMania</title>
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
        }

        h2 {
            color: var(--highlight-color);
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 500;
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

        .message {
            color: #e63946;
            margin-top: 10px;
            font-size: 0.9rem;
        }

        .indicator {
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: var(--highlight-color);
            text-decoration: none;
            font-weight: 500;
            text-align: center;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>

        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo '<div class="message">' . htmlspecialchars($_SESSION['error']) . '</div>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<div class="message text-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
            unset($_SESSION['success']);
        }
        ?>

        <form action="../public/index.php?controller=auth&action=register" method="POST" onsubmit="return validatePasswords()">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email :</label>
                <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" id="password" name="password" placeholder="Entrez un mot de passe" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmer le mot de passe :</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
                <div id="passwordMatch" class="indicator"></div>
            </div>
            <button type="submit">S'inscrire</button>
        </form>

        <a href="home.php" class="btn btn-secondary mt-3 w-100">Retour à l'accueil</a>


    </div>

    <script>

        function validatePasswords() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                alert('Les mots de passe ne correspondent pas.');
                return false;
            }
            return true;
        }

        document.getElementById('confirm_password').addEventListener('input', function () {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            const passwordMatch = document.getElementById('passwordMatch');

            if (password === confirmPassword) {
                passwordMatch.innerHTML = '<span class="text-success">Les mots de passe correspondent</span>';
            } else {
                passwordMatch.innerHTML = '<span class="text-danger">Les mots de passe ne correspondent pas</span>';
            }
        });
    </script>
</body>
</html>
