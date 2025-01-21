<?php
// Mulai sesi dengan pengaturan keamanan tambahan
session_start([
    'cookie_lifetime' => 0, // Cookie hanya berlaku selama browser aktif
    'cookie_httponly' => true, // Mencegah akses cookie melalui JavaScript
    'cookie_secure' => isset($_SERVER['HTTPS']), // Hanya gunakan cookie di HTTPS
    'use_strict_mode' => true, // Mencegah serangan sesi ID yang tidak valid
]);

// Validasi apakah pengguna sudah login sebelum logout
if (!isset($_SESSION['user_id'])) {
    // Jika tidak ada sesi aktif, arahkan langsung ke halaman login
    header("Location: login.php");
    exit();
}

// Hapus semua variabel sesi (langkah pertama)
$_SESSION = [];

// Hapus cookie sesi (jika ada)
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// Hancurkan sesi di server (langkah kedua)
session_destroy();

// Regenerasi ID sesi untuk mencegah serangan fixation
session_start();
session_regenerate_id(true);

// Tambahkan log aktivitas logout (opsional)
$logFile = __DIR__ . '/logs/logout.log';
$logMessage = sprintf(
    "[%s] User ID %s logged out from IP %s\n",
    date('Y-m-d H:i:s'),
    $_SESSION['user_id'] ?? 'Unknown',
    $_SERVER['REMOTE_ADDR'] ?? 'Unknown'
);
file_put_contents($logFile, $logMessage, FILE_APPEND);

// Arahkan pengguna ke halaman login atau halaman utama dengan pesan sukses
header("Location: /login.php");
exit();
?>
