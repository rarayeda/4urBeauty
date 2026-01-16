<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan - Cosmetics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">
    
    <div class="w-64 bg-pink-700 min-h-screen text-white p-5">
        <h1 class="text-2xl font-bold mb-10 text-center">Cosmetics ✨</h1>
        <nav class="space-y-4">
            <a href="admin_dashboard.php" class="block p-3 hover:bg-pink-600 rounded flex items-center"><i class="fas fa-chart-line mr-3"></i> Dashboard</a>
            <a href="admin_produk.php" class="block p-3 hover:bg-pink-600 rounded flex items-center"><i class="fas fa-box mr-3"></i> Data Produk</a>
            <a href="admin_pesanan.php" class="block p-3 hover:bg-pink-600 rounded flex items-center"><i class="fas fa-shopping-bag mr-3"></i> Pesanan</a>
            <a href="admin_pelanggan.php" class="block p-3 bg-pink-800 rounded shadow flex items-center"><i class="fas fa-users mr-3"></i> Pelanggan</a>
             <div class="pt-10">
                <a href="index.php" target="_blank" class="block p-3 hover:bg-pink-500 transition rounded text-sm italic border-t border-pink-400">
                    <i class="fas fa-external-link-alt mr-2"></i> Lihat Toko (User)
                </a>
        </nav>
    </div>

    <div class="flex-1 p-10">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Data Pelanggan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php 
            $query = mysqli_query($conn, "SELECT * FROM users");
            while($user = mysqli_fetch_assoc($query)) :
            ?>
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center">
                <div class="w-12 h-12 bg-pink-100 text-pink-600 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-user text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-800"><?= $user['username']; ?></h3>
                    <p class="text-gray-500 text-sm"><?= $user['email'] ?? 'Tidak ada email'; ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>