<?php
session_start();  // Démarrer la session pour gérer l'authentification
require 'bdd.php';

// Créer une instance de la classe Database
$database = new Database();
$conn = $database->getConnection(); // Obtenir la connexion

$error_message = ''; // Initialiser le message d'erreur

// Partie Connexion
if (isset($_POST['connexion'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM client WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['client'] = $email;
            $_SESSION['logged_in'] = true;
            header("Location: accueil.php");
            exit();
        } else {
            $error_message = 'Mot de passe incorrect.';
        }
    } else {
        $error_message = 'Aucun utilisateur trouvé avec cet email.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f8f9fa; /* Gris clair pour le fond */
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff; /* Fond blanc pour le formulaire */
            border-radius: 8px; /* Coins arrondis */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre douce */
            width: 360px;
            padding: 20px;
        }

        h2 {
            color: #ff7f50; /* Orange vif pour le titre */
            font-weight: bold;
            font-size: 24px; /* Taille du titre */
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            color: #333; /* Gris foncé pour les labels */
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc; /* Bordure légère */
            border-radius: 5px;
            font-size: 16px;
            background-color: #f8f9fa; /* Fond gris clair pour les champs */
        }

        input:focus {
            border-color: #ff7f50; /* Bordure orange lors du focus */
            outline: none;
        }

        button {
            background-color: #ff7f50; /* Orange vif */
            color: #fff; /* Blanc pour le texte */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff4500; /* Orange foncé au survol */
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($error_message): ?>
            <p class="error-message"><?= $error_message ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <h2>Connexion</h2>
            <label for="login-email">Email :</label>
            <input type="email" id="login-email" name="email" required>

            <label for="login-password">Mot de passe :</label>
            <input type="password" id="login-password" name="password" required>

            <button type="submit" name="connexion">Se connecter</button>
        </form>

        <p>Pas de compte ? <a href="inscription.php">Inscrivez-vous ici.</a></p>
    </div>
</body>
</html>