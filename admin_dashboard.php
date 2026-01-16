<?php 
// Mengaktifkan pelaporan error sederhana agar tidak langsung Fatal Error
mysqli_report(MYSQLI_REPORT_OFF);
include 'koneksi.php'; 

// 1. Ambil data produk, pesanan, dan user
$count_produk = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM produk")) ?: 0;
$count_pesanan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pesanan")) ?: 0;
$count_users = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users")) ?: 0;

// 2. Logika Pendapatan yang Aman (Anti-Unknown Column)
$total_pemasukan = 0;
$cek_kolom = mysqli_query($conn, "SELECT SUM(total) as total_masuk FROM pesanan");

if ($cek_kolom) {
    $data = mysqli_fetch_assoc($cek_kolom);
    $total_pemasukan = $data['total_masuk'] ?? 0;
} else {
    // Jika kolom 'total' tidak ada, coba kolom 'total_harga'
    $cek_kolom_alt = mysqli_query($conn, "SELECT SUM(total_harga) as total_masuk FROM pesanan");
    if ($cek_kolom_alt) {
        $data_alt = mysqli_fetch_assoc($cek_kolom_alt);
        $total_pemasukan = $data_alt['total_masuk'] ?? 0;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <div class="w-64 bg-pink-700 min-h-screen text-white p-5">
            <h1 class="text-2xl font-bold mb-10 text-center">Cosmetics ✨</h1>
            <nav     class="space-y-4">
    <a href="admin_dashboard.php" class="block p-3 bg-pink-800 rounded shadow">
        <i class="fas fa-chart-line mr-2"></i> Dashboard
    </a>
    
    <a href="admin_produk.php" class="block p-3 hover:bg-pink-600 transition">
        <i class="fas fa-box mr-2"></i> Data Produk
    </a>
    
    <a href="pesanan.php" class="block p-3 hover:bg-pink-600 transition">
        <i class="fas fa-shopping-bag mr-2"></i> Pesanan
    </a>
    
    <a href="admin_pelanggan.php" class="block p-3 hover:bg-pink-600 transition rounded">
                <i class="fas fa-users mr-2"></i> Pelanggan
            </a>

            <div class="pt-10">
                <a href="index.php" target="_blank" class="block p-3 hover:bg-pink-500 transition rounded text-sm italic border-t border-pink-400">
                    <i class="fas fa-external-link-alt mr-2"></i> Lihat Toko (User)
                </a>
</nav>
        </div>

        <div class="flex-1 p-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Ringkasan Toko</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-md border-b-4 border-pink-500">
                    <p class="text-gray-500 text-sm font-bold uppercase">Total Produk</p>
                    <p class="text-3xl font-bold"><?php echo $count_produk; ?></p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border-b-4 border-blue-500">
                    <p class="text-gray-500 text-sm font-bold uppercase">Pesanan Masuk</p>
                    <p class="text-3xl font-bold"><?php echo $count_pesanan; ?></p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border-b-4 border-orange-500">
                    <p class="text-gray-500 text-sm font-bold uppercase">Total User</p>
                    <p class="text-3xl font-bold"><?php echo $count_users; ?></p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md border-b-4 border-green-500">
                    <p class="text-gray-500 text-sm font-bold uppercase">Pendapatan</p>
                    <p class="text-2xl font-bold text-green-600">
                        Rp <?php echo number_format($total_pemasukan, 0, ',', '.'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>