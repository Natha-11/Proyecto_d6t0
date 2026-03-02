<?php
session_start();
include 'conexion.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['cart']) || empty($input['cart'])) {
    echo json_encode(['success' => false, 'message' => 'El carrito está vacío']);
    exit;
}

$cliente_id = $_SESSION['user_id'];
$cliente_nombre = $_SESSION['user_name'];
$total = $input['total'];
$cart = $input['cart'];
$nro_factura = "INV-" . strtoupper(substr(uniqid(), -6));

// Iniciar transacción
$conexion->begin_transaction();

try {
    // Insertar factura
    $stmt = $conexion->prepare("INSERT INTO facturas (cliente_id, nro_factura, total) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $cliente_id, $nro_factura, $total);
    $stmt->execute();
    $factura_id = $stmt->insert_id;
    $stmt->close();

    // Insertar ítems
    $stmt_item = $conexion->prepare("INSERT INTO factura_items (factura_id, producto, precio) VALUES (?, ?, ?)");
    foreach ($cart as $item) {
        $stmt_item->bind_param("isd", $factura_id, $item['name'], $item['price']);
        $stmt_item->execute();
    }
    $stmt_item->close();

    $conexion->commit();

    echo json_encode([
        'success' => true,
        'invoice' => [
            'nro' => $nro_factura,
            'fecha' => date('d/m/Y H:i'),
            'cliente' => $cliente_nombre,
            'items' => $cart,
            'total' => $total
        ]
    ]);

} catch (Exception $e) {
    $conexion->rollback();
    echo json_encode(['success' => false, 'message' => 'Error al procesar la factura: ' . $e->getMessage()]);
}

$conexion->close();
?>