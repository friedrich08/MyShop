<?php
namespace MyShop\Models;

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Démarrer la session seulement si elle n'est pas déjà active
}
class Cart {
    private $items = [];
    private $conn;

    public function __construct($conn = null) {
        if ($conn !== null) {
            $this->conn = $conn;
        }
        
        // Charger les éléments du panier depuis la session
        if (isset($_SESSION['cart'])) {
            $this->items = $_SESSION['cart'];
        }
    }

    // Ajouter un produit au panier
    public function addItem(int $product_id, int $quantity): void {
        if ($this->conn === null) {
            throw new \Exception("Connexion à la base de données manquante.");
        }

        // Récupérer les informations du produit depuis la base de données
        $sql = "SELECT id_produit, nom_produit, prix_produit FROM produit WHERE id_produit = ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            throw new \Exception("Erreur lors de la préparation de la requête : " . $this->conn->error);
        }
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();

            // Si le produit est déjà dans le panier, mettre à jour la quantité
            if (isset($this->items[$product_id])) {
                $this->items[$product_id]['quantity'] += $quantity;
            } else {
                // Sinon, ajouter le produit au panier
                $this->items[$product_id] = [
                    'id' => $product['id_produit'],
                    'name' => htmlspecialchars($product['nom_produit']),
                    'price' => floatval($product['prix_produit']),
                    'quantity' => intval($quantity)
                ];
            }

            // Enregistrer les modifications dans la session
            $_SESSION['cart'] = $this->items;
        } else {
            throw new \Exception("Produit non trouvé.");
        }

        $stmt->close();
    }

    // Supprimer un produit du panier
    public function removeItem(int $product_id): void {
        if (isset($this->items[$product_id])) {
            unset($this->items[$product_id]);
            $_SESSION['cart'] = $this->items;
        }
    }

    // Mettre à jour la quantité d'un produit dans le panier
    public function updateQuantity(int $product_id, int $quantity): void {
        if (isset($this->items[$product_id]) && $quantity > 0) {
            $this->items[$product_id]['quantity'] = intval($quantity);
            $_SESSION['cart'] = $this->items;
        } elseif ($quantity <= 0) {
            $this->removeItem($product_id);
        }
    }

    // Obtenir tous les produits dans le panier
    public function getItems(): array {
        return $this->items;
    }

    // Calculer le montant total du panier
    public function getTotalAmount(): float {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    // Vider complètement le panier
    public function clearCart(): void {
        $this->items = [];
        $_SESSION['cart'] = [];
    }

    // Vérifier si le panier est vide
    public function isEmpty(): bool {
        return empty($this->items);
    }
}