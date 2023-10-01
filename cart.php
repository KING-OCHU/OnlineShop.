<?php
session_start();

// Product information
$products = [
    1 => ["name" => "simu", "price" => 1,000],
    2 => ["name" => "watu", "price" => 20,000],
    3 => ["name" => "monitor", "price" => 150,000],
    4 => ["name" => "keyboard", "price" => 15,000],
    5 => ["name" => "printer", "price" => 550,000],
    6 => ["name" => "mouth", "price" => 9,000],


    // Add more products as needed
];

// Handle adding products to the cart
if (isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    if (isset($products[$product_id])) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][] = $product_id;
    }
}

// Calculate total price
function calculateTotal($cart) {
    global $products;
    $total = 0;
    foreach ($cart as $product_id) {
        if (isset($products[$product_id])){
            $total += $products[$product_id]['price'];
        }
    }
    return $total;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
</head>
<body>
    <!-- Your HTML content here -->
    
    
    
    <aside>
        <!-- Display cart content -->
        <h2>Your Cart</h2>
        <ul>
            <?php
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $product_id) {
                    echo "<li>{$products[$product_id]['name']}</li>";
                }
            }
            ?>
        </ul>
        <p>Total: $<?php echo calculateTotal($_SESSION['cart']); ?></p>
    </aside>
    
    <!-- Rest of your HTML content -->
</body>
</html>
