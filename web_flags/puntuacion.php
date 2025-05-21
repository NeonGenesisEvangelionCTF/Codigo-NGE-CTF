<?php

/*** @title     : Neon Genesis Evangelion CTF
 ** @author    : Óscar Martínez Soria <martinezsoriaoscar2gmail.com>
 ** @copyright : Óscar Martínez Soria (c) 2025
 ** @version   : 1.0.0
 ** Proyecto final de ASIR - CIFP Nº1 Cuenca (2023/25)*
 **/

include 'config.php';

// Verificar si el usuario está logueado usando el id
if (!isset($_SESSION['usuario_id'])) {
    header("Location: registro.php");
    exit();
}

// Obtener progreso desde la BBDD usando el ID
$stmt = $conexion->prepare(
    "SELECT flags_completadas FROM jugadores WHERE id = ?"
);
$stmt->bind_param("i", $_SESSION['usuario_id']);
$stmt->execute();
$resultado = $stmt->get_result()->fetch_assoc();

$aciertos = $resultado['flags_completadas'] ?? 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>NGE CTF | Puntuación</title>
    <!--<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="styles/estilo.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="contenedor">
        <h2>RESULTADOS</h2>
        <!-- Imprimimos el progreso y nombre del jugador -->
        <p>JUGADOR: <?php echo htmlspecialchars($_SESSION['nombre']); ?></p>
        <p>PROGRESO: <span class="mensaje-correcto"><?php echo $aciertos; ?>/6 flags</span></p>
        
        <!-- Botón para volver a banderas -->
        <a href="flags.php" class="boton-volver">VOLVER A LOS DESAFÍOS</a>

        <?php if ($aciertos != 6): ?>
            <!-- Imagen que aparece por defecto -->
            <div style="margin-top: 30px;">
                <img src="./img/rei.webp" alt="Rei delante de una luna llena" style="height: 500px; width: 750px; border: 1px solid #e50914;">
            </div>
        <?php endif; ?>
        
        <?php if ($aciertos == 6): ?>
            <!-- Contenido al completar todas las banderas -->
            <div style="margin-top: 30px;">
                <img src="./img/3rd.jpeg" alt="El tercer impacto" style="height: 500px; width: 750px; border: 1px solid #e50914;"><br>
                <p>Komm, süsser tod. Ven, dulce muerte.<br>Algo está ocurriendo, es inevitable, está pasando.</p>
                <a href="final.php" class="enlace-completado">ACCEDER AL FINAL</a>
            </div>
        <?php endif; ?>
    </div>
    <footer>
        <p>Proyecto Neon Genesis Evangelion CTF | <strong>Óscar Martínez Soria</strong> 2025</p>
    </footer>
</body>
</html>