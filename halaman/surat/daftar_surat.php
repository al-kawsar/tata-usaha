<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <title>Dashboard</title>
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    <style>
        .njj {
            margin: 0 6px;
        }
    </style>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <?php include __DIR__ . '/../../includes/sidebar.php'; ?>
        <div class="flex flex-col flex-1 w-full">
            <?php include __DIR__ . '/../../includes/navbar.php'; ?>

            <main class="h-full pb-16 px-6 overflow-y-auto">
                <div class="container grid mx-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Daftar Surat
                    </h2>



                    <!-- With actions -->
                    <div class="mb-4 text-sm font-semibold text-gray-600 dark:text-gray-300">
                        <div class="flex align-center justify-end">
                            <a class="rounded bg-blue-600 text-white p-2 njj" href="add_curhat.php">Tambah Data</a><br>
                        </div>
                    </div>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <?php
                                        $columns = ['id', 'nama', 'nisn', 'tgl_lahir', 'aksi'];
                                        foreach ($columns as $col) echo "<th class='px-4 py-3'>".ucfirst($col)."</th>";
                                        ?>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php
                                    include __DIR__ . "/../../config.php";
                                    $i = 1;
                                    $query = mysqli_query($conn, "SELECT * FROM siswa");
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        echo "<tr class='text-gray-700 dark:text-gray-400'>";
                                        echo "<td class='px-4 py-3'>".$i++."</td>";
                                        foreach ($columns as $col) {
                                            if ($col !== 'aksi') echo "<td class='px-4 py-3'>".($data[$col] ?? '-')."</td>";
                                        }
                                        echo "<td class='px-4 py-3'>
                                        <button class='px-2 py-2 text-purple-600' aria-label='Edit'>Edit</button>
                                        <button class='px-2 py-2 text-red-600' aria-label='Delete'>Delete</button>
                                        </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>