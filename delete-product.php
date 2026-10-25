<?php
session_start();
include "connect.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

if ($id > 0) {
    $sql = "DELETE FROM product
            WHERE id = '$id' AND id_user = '$user_id'";

    $conn->query($sql);
}

header("Location: my-product.php");
exit();
?>