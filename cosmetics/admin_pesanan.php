<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Masuk - Cosmetics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">
    
    <div class="w-64 bg-pink-700 min-h-screen text-white p-5">
        <h1 class="text-2xl font-bold mb-10 text-center">Cosmetics ✨</h1>
        <nav class="space-y-4">
            <a href="admin_dashboard.php" class="block p-3 hover:bg-pink-600 rounded flex items-center"><i class="fas fa-chart-line mr-3"></i> Dashboard</a>
            <a href="admin_produk.php" class="block p-3 hover:bg-pink-600 rounded flex items-center"><i class="fas fa-box mr-3"></i> Data Produk</a>
            <a href="admin_pesanan.php" class="block p-3 bg-pink-800 rounded shadow flex items-center"><i class="fas fa-shopping-bag mr-3"></i> Pesanan</a>
            <a href="admin_pelanggan.php" class="block p-3 hover:bg-pink-600 rounded flex items-center"><i class="fas fa-users mr-3"></i> Pelanggan</a> <div class="pt-10">
                <a href="index.php" target="_blank" class="block p-3 hover:bg-pink-500 transition rounded text-sm italic border-t border-pink-400">
                    <i class="fas fa-external-link-alt mr-2"></i> Lihat Toko (User)
                </a>
        </nav>
    </div>

    <div class="flex-1 p-10">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Pesanan Masuk</h2>
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="p-4 font-bold">Tgl Pesan</th>
                        <th class="p-4 font-bold">Nama Pelanggan</th>
                        <th class="p-4 font-bold">Total Bayar</th>
                        <th class="p-4 font-bold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Query untuk mengambil data pesanan dari tabel 'pesanan'
                    $query = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id_pesanan DESC");
                    while($row = mysqli_fetch_assoc($query)) :
                    ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4"><?= $row['tanggal'] ?? date('Y-m-d'); ?></td>
                        <td class="p-4 font-semibold"><?= $row['nama_pembeli'] ?? 'Pelanggan Umum'; ?></td>
                        <td class="p-4 text-green-600 font-bold">Rp <?= number_format($row['total'] ?? $row['total_harga'], 0, ',', '.'); ?></td>
                        <td class="p-4">
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-bold">Diproses</span>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>