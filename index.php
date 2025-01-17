<?php
// index.php
require_once 'config.php';
check_login();

// Get summary data
$total_siswa = query("SELECT COUNT(*) as total FROM siswa WHERE status_siswa = 'Aktif'")->fetch_assoc()['total'];
$total_guru = query("SELECT COUNT(*) as total FROM guru WHERE status_guru = 'Aktif'")->fetch_assoc()['total'];
$total_kelas = query("SELECT COUNT(*) as total FROM kelas")->fetch_assoc()['total'];
$total_surat_masuk = query("SELECT COUNT(*) as total FROM surat_masuk WHERE MONTH(tgl_diterima) = MONTH(CURRENT_DATE())")->fetch_assoc()['total'];

$page_title = "Dashboard";
include 'includes/header.php';
?>

<!-- Main content -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $total_siswa; ?></h3>
                <p>Siswa Aktif</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="siswa/list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- Add other summary boxes -->
</div>

<!-- Charts -->
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Grafik Kehadiran</h3>
            </div>
            <div class="card-body">
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>
    </div>
    <!-- Add other charts -->
</div>

<?php include 'includes/footer.php'; ?>

<!-- Add Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
// Add chart initialization code here
</script>