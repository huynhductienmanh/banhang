<?php
$data = json_decode(
    file_get_contents('php://input'),
    true
);

$id = $data['id'] ?? null;

echo json_encode([
    'success' => true,
    'id' => $id
]);
?>