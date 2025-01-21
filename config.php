<?php
// config.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
// define('DB_NAME', 'school_xii_tatausaha');
define('DB_NAME', 'school_laravel_tata_usaha');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Functions for database operations
function query($sql) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    return $result;
}

function escape_string($string) {
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

// session_start();

function check_login() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}

