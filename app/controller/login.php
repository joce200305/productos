<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Debug: Verifica los datos en la sesión
    /* echo '<pre>';
    print_r($_SESSION['usuarios']);
    echo '</pre>'; */

   
    if (isset($_SESSION['usuarios'][$email])) {
        
        if ($_SESSION['usuarios'][$email]['password'] === $password) {
            $_SESSION['user'] = $email; 
            /* header('Location: ../../bienvenida.php');
            exit(); */
            echo json_encode([1,"Datos de acceso correctos"]);
        } else {
            echo json_encode([0, "Password erroneo!"]);
        }
    } else {
        echo json_encode([0, "Email no encontrado"]);
    }
}

// Redirigir de vuelta al login si hay error
/* header('Location: ../../login.php?error=1');
exit(); */
?>
