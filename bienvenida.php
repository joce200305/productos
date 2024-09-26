<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Bienvenida</title>
    <style>
        body {
            background-image: linear-gradient(to top, #f7a8b8 0%, #f5c1e2 100%);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .card {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 30px; /* Aumenta el padding para una card más grande */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px; /* Aumenta el ancho máximo */
            text-align: center;
        }
        .card-header {
            background-color: #f8f9fa;
            color: #343a40;
            font-size: 1.5rem;
            border-bottom: none;
            padding-bottom: 10px;
        }
        .btn {
            border-radius: 10px;
            padding: 8px 12px;
            font-size: 0.875rem;
            border: none; /* Elimina el borde */
        }
        .btn-danger {
            background-color: #e57373; /* Color rojo */
            color: white;
        }
        .btn-danger:hover {
            background-color: #c62828; /* Rojo más oscuro */
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-user-check"></i> Bienvenida
        </div>
        <div class="card-body">
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
            <a href="app/controller/logout.php" class="btn btn-danger mt-3">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
