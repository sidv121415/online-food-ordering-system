<?php
session_start();
require 'db_connection.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    if (isset($_POST['pid']) && isset($_POST['pname']) && isset($_POST['pprice'])) {
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pprice = $_POST['pprice'];
        $pimage = $_POST['pimage'];
        $pcode = $_POST['pcode'];
        $pqty = 1;

        $total_price = $pprice * $pqty;

        $stmt = $conn->prepare('SELECT itemName FROM cart WHERE itemName=? AND email=?');
        $stmt->bind_param('ss', $pname, $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $r = $res->fetch_assoc();
        $code = $r['itemName'] ?? '';

        if (!$code) {
            $query = $conn->prepare('INSERT INTO cart (itemName, price, image, quantity, total_price, catName, email) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $query->bind_param('sdsisss', $pname, $pprice, $pimage, $pqty, $total_price, $pcode, $email);
            $query->execute();

            echo json_encode(['status' => 'success', 'message' => 'Item added to your cart!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Item already exists in your cart!']);
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'You must be logged in to add items to the cart.']);
}
?>
