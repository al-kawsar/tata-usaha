
<?php
$url = "http://127.0.0.1:8001/halaman/surat/daftar_surat.php";

$path = parse_url($url, PHP_URL_PATH);
$path_parts = explode('/', trim($path, '/'));
$page = isset($path_parts[1]) ? $path_parts[1] : '';
?>

<!-- Desktop sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            TataUsaha
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
              <?php if ($page == ''): ?>
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"></span>
            <?php endif; ?>
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 <?php echo $page == '' ? 'text-gray-800' : ''; ?> dark:text-gray-100"
                href="dashboard.php">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
            </path>
        </svg>
        <span class="ml-4">Dashboard</span>
    </a>
</li>
</ul>
<ul>
    <li class="relative px-6 py-3">
     <?php if ($page == 'absensi'): ?>
        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
        aria-hidden="true"></span>
    <?php endif; ?>
    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 <?php echo $page == 'absensi' ? 'text-gray-800' : ''; ?>"
        href="forms.html">
        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path
        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
    </path>
</svg>
<span class="ml-4">Absensi</span>
</a>
</li>
<li class="relative px-6 py-3">
 <?php if ($page == 'guru'): ?>
    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
    aria-hidden="true"></span>
<?php endif; ?>
<a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 <?php echo $page == 'guru' ? 'text-gray-800' : ''; ?>"
    href="forms.html">
    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
    <path
    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
</path>
</svg>
<span class="ml-4">Guru</span>
</a>
</li>

<li class="relative px-6 py-3">
 <?php if ($page == 'kelas'): ?>
    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
    aria-hidden="true"></span>
<?php endif; ?>
<a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 <?php echo $page == 'kelas' ? 'text-gray-800' : ''; ?>"
    href="forms.html">
    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
    <path
    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
</path>
</svg>
<span class="ml-4">Kelas</span>
</a>
</li>

<li class="relative px-6 py-3">
 <?php if ($page == 'siswa'): ?>
    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
    aria-hidden="true"></span>
<?php endif; ?>
<a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 <?php echo $page == 'siswa' ? 'text-gray-800' : ''; ?>"
    href="forms.html">
    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
    <path
    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
</path>
</svg>
<span class="ml-4">Siswa</span>
</a>
</li>

<li class="relative px-6 py-3">
 <?php if ($page == 'surat'): ?>
    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
    aria-hidden="true"></span>
<?php endif; ?>
<a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 <?php echo $page == 'surat' ? 'text-gray-800' : ''; ?>"
    href="forms.html">
    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
    <path
    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
</path>
</svg>
<span class="ml-4">Surat</span>
</a>
</li>

<li class="relative px-6 py-3">
   <?php if ($page == 'laporan'): ?>
    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
    aria-hidden="true"></span>
<?php endif; ?>
<a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 <?php echo $page == 'laporan' ? 'text-gray-800' : ''; ?>"
    href="forms.html">
    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
    <path
    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
</path>
</svg>
<span class="ml-4">Laporan</span>
</a>
</li>

</ul>
<div class="px-6 my-6">
    <a href="/logout.php"
    class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
    Logout
    <span class="ml-2" aria-hidden="true">+</span>
</a>
</div>
</div>
</aside>



















<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0"
class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
@keydown.escape="closeSideMenu">
<div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
        TataUsaha
    </a>
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
            aria-hidden="true"></span>
            <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 <?php echo $page == 'dashboard.php' ? 'text-gray-800' : ''; ?> dark:text-gray-100"
                href="index.html">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
            </path>
        </svg>
        <span class="ml-4">Dashboard</span>
    </a>
</li>
</ul>
<ul>
    <li class="relative px-6 py-3">
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 <?php echo $page == 'dashboard.php' ? 'text-gray-800' : ''; ?>"
            href="forms.html">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path
            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
        </path>
    </svg>
    <span class="ml-4">Forms</span>
</a>
</li>

</ul>
<div class="px-6 my-6">
    <a href="/logout.php"
    class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
    Logout
    <span class="ml-2" aria-hidden="true">+</span>
</a>
</div>
</div>
</aside>