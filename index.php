<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Listado de Productos</title>
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
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .card-header {
            background-color: #f8f9fa;
            color: #343a40;
            font-size: 1.5rem;
            border-bottom: none;
            text-align: center;
            padding-bottom: 10px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn {
            border-radius: 10px;
            padding: 8px 12px;
            font-size: 0.875rem;
            border: none;
        }
        .btn-primary {
            background-color: #f77f7f; 
            color: white;
        }
        .btn-primary:hover {
            background-color: #e63946; 
        }
        .btn-danger {
            background-color: #d9534f;
        }
        .btn-danger:hover {
            background-color: #c9302c;
        }
        .text-center {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-box icon"></i> Listado de Productos
        </div>
        <div class="card-body">
            <form id="productForm">
                <input type="hidden" id="index" name="index" value="">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Producto</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-tag"></i></span>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Producto</button>
            </form>
            <ul class="list-group mt-4" id="productList"></ul>
            <div class="text-center mt-4">
                <a class="btn btn-danger" href="app/controller/logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </div>

    <script src="./public/js/main6.js"></script>
</body>
</html>
