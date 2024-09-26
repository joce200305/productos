<?php
session_start();

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = (float)$_POST['precio'];
    
    if (isset($_POST['index']) && is_numeric($_POST['index'])) {
        $index = (int)$_POST['index'];
        if (isset($_SESSION['productos'][$index])) {
            $_SESSION['productos'][$index] = ['nombre' => $nombre, 'precio' => $precio];
        }
    } else {
        $_SESSION['productos'][] = ['nombre' => $nombre, 'precio' => $precio];
    }

    echo json_encode(['success' => true, 'productos' => $_SESSION['productos']]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $index = (int)$_DELETE['index'];

    if (isset($_SESSION['productos'][$index])) {
        array_splice($_SESSION['productos'], $index, 1);
        echo json_encode(['success' => true, 'productos' => $_SESSION['productos']]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(['productos' => $_SESSION['productos']]);
    exit();
}
