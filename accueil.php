<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contact_submit'])) {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $message = htmlspecialchars($_POST['message']);

    $formattedMessage = urlencode("Nom: $name $prenom\nMessage: $message");

    $whatsappUrl = "https://wa.me/22870775692?text=$formattedMessage";
    header("Location: $whatsappUrl");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - MyShop</title>
    <link rel="stylesheet" href="accueil.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="logoshop.png" alt="MyShop" class="logo">
                MyShop
            </a>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link">Accueil</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">À propos</a></li>
                <li class="nav-item"><a href="#products" class="nav-link">Articles</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="connexion.php" class="btn-orange">S'inscrire</a></li>
                <li class="nav-item"><a href="connexion.php" class="btn-orange">Se déconnecter</a></li>
                <li class="nav-item"><a href="panier.php" class="btn-orange">Panier 🛒</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <img src="Acceuil.jpg" class="hero-image" alt="Shopping">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Nos Nouveaux Produits</h1>
            <p class="hero-subtitle">Découvrez les dernières tendances de MyShop !</p>
            <a href="#products" class="btn-orange">Découvrir la collection</a>
        </div>
    </div>

    <!-- About Section -->
    <section id="about" class="about-section">
        <h2>À propos de MyShop</h2>
        <p>
            Bienvenue chez MyShop, votre destination en ligne pour une mode tendance et accessible. Découvrez notre sélection soigneusement choisie de vêtements pour hommes et femmes, alliant style, qualité et confort. Que vous recherchiez des pièces casual, des tenues élégantes ou des accessoires pour parfaire votre look, nous avons ce qu’il vous faut. Profitez d’une expérience d’achat simple et rapide, avec des livraisons fiables et un service client dédié. MyShop – où la mode rencontre la praticité !
        </p>
    </section>

    <!-- Products Section -->
    <section id="products" class="products-section">
        <h2>Nos Articles</h2>
        <!-- Barre de recherche avec filtre intégré -->
        <div class="search-bar">
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Rechercher un produit..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                <select name="category">
                    <option value="all" <?= (!isset($_GET['category']) || $_GET['category'] === 'all') ? 'selected' : '' ?>>Toutes les catégories</option>
                    <option value="Casual" <?= (isset($_GET['category']) && $_GET['category'] === 'Casual') ? 'selected' : '' ?>>Casual</option>
                    <option value="Été" <?= (isset($_GET['category']) && $_GET['category'] === 'Été') ? 'selected' : '' ?>>Été</option>
                    <option value="Vestes" <?= (isset($_GET['category']) && $_GET['category'] === 'Vestes') ? 'selected' : '' ?>>Vestes</option>
                    <option value="Hiver" <?= (isset($_GET['category']) && $_GET['category'] === 'Hiver') ? 'selected' : '' ?>>Hiver</option>
                    <option value="Business" <?= (isset($_GET['category']) && $_GET['category'] === 'Business') ? 'selected' : '' ?>>Business</option>
                    <option value="Sport" <?= (isset($_GET['category']) && $_GET['category'] === 'Sport') ? 'selected' : '' ?>>Sport</option>
                    <option value="Soirée" <?= (isset($_GET['category']) && $_GET['category'] === 'Soirée') ? 'selected' : '' ?>>Soirée</option>
                </select>
                <button type="submit">Rechercher</button>
            </form>
        </div>

        <!-- Conteneur des produits -->
        <div class="product-container">
            <?php
            // Données des produits
            $products = [
                [
                    "id" => 1,
                    "name" => "T-shirt Premium Coton",
                    "price" => "2000 FCFA",
                    "image" => "T-shirt en cotton.jpg",
                    "description" => "T-shirt en coton bio de haute qualité, coupe moderne et confortable.",
                    "category" => "Casual"
                ],
                [
                    "id" => 2,
                    "name" => "Jean Slim Fit",
                    "price" => "3000 FCFA",
                    "image" => "jean.avif",
                    "description" => "Jean coupe slim en denim stretch, parfait pour un look décontracté.",
                    "category" => "Casual"
                ],
                [
                    "id" => 3,
                    "name" => "Robe d'Été Florale",
                    "price" => "5000 FCFA",
                    "image" => "robe ete.jpg",
                    "description" => "Robe légère à motifs floraux, idéale pour la saison estivale.",
                    "category" => "Été"
                ],
                [
                    "id" => 4,
                    "name" => "Veste en Cuir",
                    "price" => "15000 FCFA",
                    "image" => "veste en cuire.avif",
                    "description" => "Veste en cuir véritable, style classique et intemporel.",
                    "category" => "Vestes"
                ],
                [
                    "id" => 5,
                    "name" => "Pull Hiver",
                    "price" => "2000 FCFA",
                    "image" => "download.webp",
                    "description" => "Pull chaud et confortable en laine mérinos, parfait pour l'hiver.",
                    "category" => "Hiver"
                ],
                [
                    "id" => 6,
                    "name" => "Chemise Business",
                    "price" => "4500 FCFA",
                    "image" => "chemise.avif",
                    "description" => "Chemise élégante en coton, coupe ajustée pour un look professionnel.",
                    "category" => "Business"
                ],
                [
                    "id" => 7,
                    "name" => "Short Sport",
                    "price" => "1500 FCFA",
                    "image" => "short.jpg",
                    "description" => "Short léger et respirant, parfait pour vos activités sportives.",
                    "category" => "Sport"
                ],
                [
                    "id" => 8,
                    "name" => "Blazer Élégant",
                    "price" => "20000 FCFA",
                    "image" => "blazer.jpg",
                    "description" => "Blazer moderne, parfait pour les occasions formelles.",
                    "category" => "Business"
                ],
                [
                    "id" => 9,
                    "name" => "Robe de Soirée",
                    "price" => "10000 FCFA",
                    "image" => "robe de soirée.jpg",
                    "description" => "Robe élégante pour vos soirées spéciales.",
                    "category" => "Soirée"
                ],
                [
                    "id" => 10,
                    "name" => "Pantalon Chino",
                    "price" => "3000 FCFA",
                    "image" => "pantalon.avif",
                    "description" => "Pantalon chino en coton, coupe droite et confortable.",
                    "category" => "Casual"
                ],
                [
                    "id" => 11,
                    "name" => "Robe Cocktail",
                    "price" => "6000 FCFA",
                    "image" => "robe cocktail.avif",
                    "description" => "Robe courte élégante pour vos cocktails et événements.",
                    "category" => "Soirée"
                ],
                [
                    "id" => 12,
                    "name" => "Veste de Sport",
                    "price" => "3500 FCFA",
                    "image" => "veste de sport.jpg",
                    "description" => "Veste technique respirante pour vos activités sportives.",
                    "category" => "Sport"
                ]
            ];

            // Récupérer la catégorie sélectionnée (ou 'all' par défaut)
            $selectedCategory = $_GET['category'] ?? 'all';

            // Récupérer la recherche
            $searchQuery = isset($_GET['search']) ? strtolower($_GET['search']) : '';

            // Filtrer les produits
            foreach ($products as $product) {
                $matchesCategory = ($selectedCategory === 'all' || $product['category'] === $selectedCategory);
                $matchesSearch = (empty($searchQuery) || strpos(strtolower($product['name']), $searchQuery) !== false || strpos(strtolower($product['description']), $searchQuery) !== false);

                if ($matchesCategory && $matchesSearch) {
                    echo '
                    <div class="product-card" data-category="' . htmlspecialchars($product["category"]) . '">
                        <img src="' . htmlspecialchars($product["image"]) . '" alt="' . htmlspecialchars($product["name"]) . '" class="product-image">
                        <div class="product-info">
                            <h3 class="product-name">' . htmlspecialchars($product["name"]) . '</h3>
                            <p class="product-price">' . htmlspecialchars($product["price"]) . '</p>
                            <p class="product-description">' . htmlspecialchars($product["description"]) . '</p>
                            <form method="POST" action="ajouter_au_panier.php">
                                <input type="hidden" name="product_id" value="' . intval($product['id']) . '">
                                <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <h2>Contactez-nous</h2>
        <form class="contact-form" action="" method="post">
            <input type="text" name="name" placeholder="Votre nom" required>
            <input type="text" name="prenom" placeholder="Votre prénom" required>
            <textarea name="message" placeholder="Votre message" required></textarea>
            <button type="submit" name="contact_submit">Envoyer via WhatsApp</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 MyShop. Tous droits réservés.</p>
    </footer>
</body>
</html>