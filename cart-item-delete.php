<?php require_once('header.php'); ?>
<?php
// Check if product info is provided
if (!isset($_REQUEST['id'], $_REQUEST['size'], $_REQUEST['color'])) {
    header('Location: cart.php');
    exit;
}

$id    = $_REQUEST['id'];
$size  = $_REQUEST['size'];
$color = $_REQUEST['color'];

// List of cart session keys
$keys = [
    'cart_p_id', 'cart_size_id', 'cart_size_name',
    'cart_color_id', 'cart_color_name',
    'cart_p_qty', 'cart_p_current_price',
    'cart_p_name', 'cart_p_featured_photo'
];

// Remove the product from cart
$length = count($_SESSION['cart_p_id'] ?? []);
for ($i = 0; $i < $length; $i++) {
    if (
        $_SESSION['cart_p_id'][$i] == $id &&
        $_SESSION['cart_size_id'][$i] == $size &&
        $_SESSION['cart_color_id'][$i] == $color
    ) {
        foreach ($keys as $key) {
            unset($_SESSION[$key][$i]);
        }
        break; // remove only the first matching item
    }
}

// Reindex session arrays to prevent gaps
foreach ($keys as $key) {
    if (isset($_SESSION[$key])) {
        $_SESSION[$key] = array_values($_SESSION[$key]);
    }
}

header('Location: cart.php');
exit;
?>
