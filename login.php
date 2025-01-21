<?php
include 'config.php';
session_start();

// Aktifkan mode exceptions untuk menangani error dari MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Fungsi untuk memverifikasi login berdasarkan jenis pengguna
function verifyLogin($username, $password, $table, $usernameField, $role) {
    global $conn;

    $query = "SELECT * FROM $table WHERE $usernameField = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['username'] = $user[$usernameField];
            $_SESSION['role'] = $role;
            header("Location: /");  // Redirect ke halaman sesuai role
            exit();
        } else {
            return "Username atau password salah!";
        }
    } else {
        return "Username atau password salah!";
    }
}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Escape input untuk menghindari SQL injection
        $username = mysqli_real_escape_string($conn, trim($_POST['username']));
        $password = trim($_POST['password']);

        // Filter untuk mencocokkan input berdasarkan format yang diharapkan
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            // Login sebagai admin
            $error = verifyLogin($username, $password, 'users', 'username', 'admin');
        } elseif (is_numeric($username) && strlen($username) >= 8) {
            // Login sebagai guru (NIP)
            $error = verifyLogin($username, $password, 'guru', 'nip', 'guru');
        } elseif (is_numeric($username) && (strlen($username) == 10 || strlen($username) == 12)) {
            // Login sebagai siswa (NISN atau NIS)
            $error = verifyLogin($username, $password, 'siswa', 'nisn', 'siswa');
        } else {
            // Jika input tidak sesuai format yang diharapkan
            $error = "Username tidak valid!";
        }
    }
} catch (mysqli_sql_exception $e) {
    $error = "Terjadi kesalahan: " . $e->getMessage();
} catch (Exception $e) {
    $error = "Terjadi kesalahan tak terduga: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Tata Usaha</title>
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
    />
    <link rel="stylesheet" href="/assets/css/tailwind.output.css" />
    <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer
    ></script>
    <script src="/assets/js/init-alpine.js"></script>
</head>
<body>
    <form method="POST"  class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
      class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
      <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
            aria-hidden="true"
            class="object-cover w-full h-full dark:hidden"
            src="https://blog-edutore-partner.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2021/05/25122840/Profesi-Bagian-Tata-Usaha_610-x-610-px.png"
            alt="Office"
            />
            <img
            aria-hidden="true"
            class="hidden object-cover w-full h-full dark:block"
            src="../assets/img/login-office-dark.jpeg"
            alt="Office"
            />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
              class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
              Login
          </h1>

          <?php if (isset($error)) : ?>
            <div class="mb-4 text-sm text-red-700 bg-red-100 border border-red-400 rounded-lg dark:bg-red-700 dark:text-red-100 dark:border-red-500 p-4">
                <span class="font-medium">Error:</span> <?= htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>


        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Username</span>
            <input
            name="username"
            autofocus="autofocus"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="johndoe"
            />
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Password</span>
            <input
            name="password"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="***************"
            type="password"
            />
        </label>

        <button type="submit"
        style="background-color: #38a169; border: none; border-radius: 0.5rem; text-align: center; display: inline-block;"
        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-green-700 border border-transparent rounded-lg active:bg-green-700 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"       >
        Log in
    </button>

</div>
</div>
</div>
</div>
</div>
</body>
</html>
