<?php

/*** @title     : Neon Genesis Evangelion CTF
 ** @author    : Óscar Martínez Soria <martinezsoriaoscar2gmail.com>
 ** @copyright : Óscar Martínez Soria (c) 2025
 ** @version   : 1.0.0
 ** Proyecto final de ASIR - CIFP Nº1 Cuenca (2023/25)*
 **/

// Iniciar sesión
session_start();

// CONEXIÓN A LA BASE DE DATOS
$conexion = new mysqli('localhost', 'root', '', 'nge_ctf');

// CONFIGURACIÓN DE FLAGS EN UN ARRAY
// - flag_correcta: respuesta válida
// - pista: ayuda tras 3 intentos fallidos
$_SESSION['flags'] = [
    1 => [
        'flag_correcta' => 'EVA{FTP_4N0N_CR3D3NT14LS}',  
        'pista' => 'Todos pueden verlo, está ahí mismo, NERV se cae.'  
    ],
    2 => [
        'flag_correcta' => 'SON{4NG3L1C4L_D3PR3SS10N}',  
        'pista' => 'No todos los ojos pueden ver lo oculto.'  
    ],
    3 => [
        'flag_correcta' => 'KID{1RU3L_4TT4CK_2015}',  
        'pista' => 'El servidor web, ahí nunca se perderá.'  
    ],
    4 => [
        'flag_correcta' => 'REI{CL0N3D_3X1ST3NC3}',  
        'pista' => 'NERV realizó cursos de [3RR0R] para esconder en [3RR0R] para defenderse de los Ángeles.'  
    ],
    5 => [
        'flag_correcta' => 'YUI{3V4_1SNT_R0B0T}',  
        'pista' => 'Debe haber alguna manera, ¡¿DENTRO DEL .[3RR0R]?!'  
    ],
    6 => [
        'flag_correcta' => 'SEELE{4LL_W1LL_R3TURN_T0_L1L1TH}',  
        'pista' => 'En NERV hicieron cursos de [3RR0R] para esconder en [3RR0R] para defenderse de los Ángeles.'  
    ],
];

// FUNCIÓN PARA VALIDAR FLAGS
/**
 * Compara la respuesta con la solución almacenada
 * @param int $flag_id - ID de la flag (1, 2...)
 * @param string $flag_usuario - Respuesta ingresada
 * @return bool - True si es correcta, False si no
 */
function validarFlag($flag_id, $flag_usuario) {
    return ($_SESSION['flags'][$flag_id]['flag_correcta'] === $flag_usuario);
}

// FUNCIÓN PARA GUARDAR PROGRESO EN BD
/**
 * Actualiza el progreso del jugador en la base de datos
 * @param string $nombre - Nombre del jugador
 * @param int $total_aciertos - Número de flags completadas
 */
function guardarProgreso($nombre, $total_aciertos) {
    global $conexion;
    
    // Prepara la consulta SQL con parámetros
    $stmt = $conexion->prepare(
        "INSERT INTO jugadores (nombre, flags_completadas) 
         VALUES (?, ?)
         ON DUPLICATE KEY UPDATE flags_completadas = ?"
    );
    
    // Vincula parámetros (s=string, i=entero)
    $stmt->bind_param("sii", $nombre, $total_aciertos, $total_aciertos);
    
    // Ejecuta la consulta
    $stmt->execute();
}
?>