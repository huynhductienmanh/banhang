<?php
session_start();
$data = json_decode(
    file_get_contents('php://input'),
    true
);
if (isset($data['id']) && isset($data['action'])) {

    $id = (int)$data['id'];
    $action = $data['action'];

    if ($action == 'tang' && isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    }

    if ($action == 'giam' && isset($_SESSION['cart'][$id])) {
        if($_SESSION['cart'][$id]>1){
            $_SESSION['cart'][$id]--;
        }else{
            echo json_encode([
            'error' => 'ko duoc xoa sp cuoi cung'
            ]);
            exit;
        }
    }

    if ($action == 'xoa' && isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
    header('Content-Type: application/json');
    echo json_encode([
        'quantity' => $_SESSION['cart'][$id] ?? 0,
        'cart' => $_SESSION['cart'] ?? [],
        'total' => array_sum($_SESSION['cart'])
    ]);
    exit;
}
?>