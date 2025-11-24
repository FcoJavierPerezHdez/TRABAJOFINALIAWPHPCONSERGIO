<?php
// app/auth.php
// Este archivo maneja todo lo relacionado con la autenticación (una vez que haces login, te reconocerá y no tendrás que volver a tener que a dar tus credenciales).

// 1. Iniciamos la sesión SIEMPRE al principio. 
// Esto permite leer y escribir en $_SESSION.
session_start();

// Creamos una función para registrar al usuario en la sesión
function login_user($user_data) {
    // Guardamos en la sesión los datos importantes
    $_SESSION['user_id'] = $user_data['id'];
    $_SESSION['username'] = $user_data['username'];
    $_SESSION['role'] = $user_data['role']; // 'admin' o 'cliente'
}

// Función para cerrar sesión
function logout_user() {
    session_unset(); // Limpia las variables
    session_destroy(); // Destruye la sesión en el servidor
}

// Función para saber si alguien está logueado
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Función de bloqueo: Si no estás logueado, te manda para el login
function require_login() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit; // detiene la ejecución después de redirigir
    }
}
?>