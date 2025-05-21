<?php

/*** @title     : Neon Genesis Evangelion CTF
 ** @author    : Óscar Martínez Soria <martinezsoriaoscar2gmail.com>
 ** @copyright : Óscar Martínez Soria (c) 2025
 ** @version   : 1.0.0
 ** Proyecto final de ASIR - CIFP Nº1 Cuenca (2023/25)*
 **/

include 'config.php'; // Incluye la configuración base
?>
<!DOCTYPE html>
<html>
<head>
    <title>NGE CTF | Tercer Impacto</title>
    <!--<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" href="styles/final.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Contenedor principal de la escena -->
    <div class="contenedor-escena">
        <h1>EL TERCER IMPACTO ES REAL</h1>
        
        <!-- Texto dramático del Tercer Impacto -->
        <div class="texto-impactante">
            La Complementación Humana es ahora inevitable.<br>
            El tercer impacto ha sido desatado. <br>
            Todos los corazones volverán a la nada. <br>
            La humanidad existe ahora como un único ser consciente.
        </div>
        
        <!-- Imagen de la escena final -->
        <img src="./img/fin.jpg" alt="Escena final de Evangelion" class="imagen-escena">
        
        <!-- Texto personalizado para el jugador -->
        <div class="texto-secundario">
            Has desatado lo inevitable, <?php echo $_SESSION['nombre']; ?>.<br>
            ¿Fue esto lo que realmente deseabas?
        </div><br><br>
    
        <!-- Botones de acción final -->
        <div class="contenedor-botones">
            <a href="index.php" class="boton-retorno">Regresar al principio</a>
            <a href="creditosfin.php" class="boton-retorno">Créditos</a>
        </div>
    </div>
    
    <!-- Pie de página -->
    <footer>
        <p>Proyecto Neon Genesis Evangelion CTF | <strong>Óscar Martínez Soria</strong> 2025</p>
    </footer>
</body>
</html>