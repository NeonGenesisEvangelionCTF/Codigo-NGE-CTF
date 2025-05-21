<?php
/*** @title     : Neon Genesis Evangelion CTF
 ** @author    : Óscar Martínez Soria <martinezsoriaoscar2gmail.com>
 ** @copyright : Óscar Martínez Soria (c) 2025
 ** @version   : 1.0.0
 ** Proyecto final de ASIR - CIFP Nº1 Cuenca (2023/25)*
 **/

include 'config.php'; // Ya tiene la conexión $conexion

// PROCESAMIENTO DEL FORMULARIO CON LA BBDD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Limpieza básica del nombre
    $nombre = trim($_POST['nombre']);
    
    if (!empty($nombre)) {
        // 2. Guardar en la BBDD
        $stmt = $conexion->prepare("INSERT INTO jugadores (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);
        
        if ($stmt->execute()) {
            // 3. Usamos el ID real de la BBDD
            $_SESSION['usuario_id'] = $stmt->insert_id; 
            $_SESSION['nombre'] = $nombre;
            
            // Redireccionamiento a flags.php
            header("Location: flags.php");
            exit();
        }
    }
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>NGE CTF | Registro</title>
    <!--<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="styles/estilo.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="contenedor">
        <h2>REGISTRO DEL JUGADOR</h2>
        <form method="POST">
            <input type="text" name="nombre" placeholder="ESCRIBE AQUÍ TU NOMBRE" required>
            <br>
            <button type="submit">CONFIRMAR</button>
        </form>
    </div>
    <footer>
        <p>Proyecto Neon Genesis Evangelion CTF | <strong>Óscar Martínez Soria</strong> 2025</p>
    </footer>
</body>
</html>