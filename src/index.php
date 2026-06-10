<?php
require 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body { 
            font-family: Arial; 
            background: linear-gradient(135deg, #667eea, #764ba2); 
            color: white; 
            text-align: center; 
            padding: 50px; 
            margin: 0;
            height: 100vh;
        }
        .card {
            background: rgba(255,255,255,0.15);
            padding: 40px;
            border-radius: 15px;
            max-width: 500px;
            margin: 0 auto;
        }
        .hora {
            font-size: 2.8em;
            font-weight: bold;
            margin: 25px 0;
        }
        button {
            padding: 15px 35px;
            background: #ff4757;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>¡Bienvenido!</h1>
        <h2><?= $_SESSION['nombre'] ?></h2>
        <p><strong>Rol:</strong> <?= $_SESSION['rol'] ?></p>
        
        <div class="hora" id="reloj"></div>
        
        <a href="logout.php">
            <button>Cerrar Sesión</button>
        </a>
    </div>

    <script>
        function actualizarReloj() {
            const ahora = new Date();
            const hora = ahora.toLocaleTimeString('es-ES', { 
                hour: '2-digit', 
                minute: '2-digit', 
                second: '2-digit' 
            });
            document.getElementById('reloj').textContent = hora;
        }
        setInterval(actualizarReloj, 1000);
        actualizarReloj();
    </script>
</body>
</html>