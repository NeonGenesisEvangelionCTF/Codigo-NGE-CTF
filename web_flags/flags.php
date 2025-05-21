<?php

/*** @title     : Neon Genesis Evangelion CTF
 ** @author    : Óscar Martínez Soria <martinezsoriaoscar2gmail.com>
 ** @copyright : Óscar Martínez Soria (c) 2025
 ** @version   : 1.0.0
 ** Proyecto final de ASIR - CIFP Nº1 Cuenca (2023/25)*
 **/

include 'config.php';

// Verificar si el usuario está logueado usando el ID
if (!isset($_SESSION['usuario_id'])) {
    header("Location: registro.php");
    exit();
}

// Procesa las flags enviadas 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['flag_id'])) {
    $flag_id = $_POST['flag_id'];
    $flag_usuario = $_POST['flag'];
    $intentos = isset($_SESSION['intentos'][$flag_id]) ? $_SESSION['intentos'][$flag_id] : 0;

    if (validarFlag($flag_id, $flag_usuario)) {
        // 1. Marcar flag como completada en sesión
        $_SESSION['aciertos'][$flag_id] = true;
        
        // 2. Actualizar contador en la BD usando el ID
        $total = count($_SESSION['aciertos']);
        $stmt = $conexion->prepare(
            "UPDATE jugadores SET flags_completadas = ? WHERE id = ?"
        );
        $stmt->bind_param("ii", $total, $_SESSION['usuario_id']);
        $stmt->execute();
        
        $mensaje = "<p class='mensaje-correcto'>¡BANDERA CORRECTA!</p>";
    } else {
        // Lógica para intentos fallidos
        $intentos++;
        $_SESSION['intentos'][$flag_id] = $intentos;
        $mensaje = "<p class='mensaje-error'>BANDERA INCORRECTA. INTENTOS: $intentos</p>";
        
        if ($intentos >= 3) {
            $mensaje .= "<p class='mensaje-pista'>PISTA: " . $_SESSION['flags'][$flag_id]['pista'] . "</p>";
        }
    }
}

// Calcular puntuación actual
$aciertos = isset($_SESSION['aciertos']) ? count($_SESSION['aciertos']) : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>NGE CTF | Banderas</title>
    <!--<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="styles/estilo.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="contenedor">
        <h2>¡REGISTRA TUS BANDERAS!</h2>
        <!-- Botón para ir a puntuación.php -->
        <a href="puntuacion.php" class="boton-puntuacion-banderas">VER PUNTUACIÓN</a>

        <?php if (isset($mensaje)) echo $mensaje; ?>

        <!-- Formulario para banderas, predefinidas en mi config.php -->
        <div class="caja-bandera">
            <h3>FLAG [1]</h3>
            <form method="POST">
                <input type="hidden" name="flag_id" value="1">
                <input type="text" name="flag" placeholder="INSERTA LA BANDERA" required>
                <button type="submit">VALIDAR</button>
            </form>
        </div>
        <div class="caja-bandera">
            <h3>FLAG [2]</h3>
            <form method="POST">
                <input type="hidden" name="flag_id" value="2">
                <input type="text" name="flag" placeholder="INSERTA LA BANDERA" required>
                <button type="submit">VALIDAR</button>
            </form>
        </div>
        <div class="caja-bandera">
            <h3>FLAG [3]</h3>
            <form method="POST">
                <input type="hidden" name="flag_id" value="3">
                <input type="text" name="flag" placeholder="INSERTA LA BANDERA" required>
                <button type="submit">VALIDAR</button>
            </form>
        </div>
        <div class="caja-bandera">
            <h3>FLAG [4]</h3>
            <form method="POST">
                <input type="hidden" name="flag_id" value="4">
                <input type="text" name="flag" placeholder="INSERTA LA BANDERA" required>
                <button type="submit">VALIDAR</button>
            </form>
        </div>
        <div class="caja-bandera">
            <h3>FLAG [5]</h3>
            <form method="POST">
                <input type="hidden" name="flag_id" value="5">
                <input type="text" name="flag" placeholder="INSERTA LA BANDERA" required>
                <button type="submit">VALIDAR</button>
            </form>
        </div>
        <div class="caja-bandera">
            <h3>FLAG [6]</h3>
            <form method="POST">
                <input type="hidden" name="flag_id" value="6">
                <input type="text" name="flag" placeholder="INSERTA LA BANDERA" required>
                <button type="submit">VALIDAR</button>
            </form>
        </div>
    </div>
    <footer>
        <p>Proyecto Neon Genesis Evangelion CTF | <strong>Óscar Martínez Soria</strong> 2025</p>
    </footer>
</body>
</html>