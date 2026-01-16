<?php 
include 'koneksi.php'; 

// Fitur Hapus Produk
if(isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM produk WHERE id_produk='$id'");
    header("Location: admin_produk.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Produk - Cosmetics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">
    
    <div class="w-64 bg-pink-700 min-h-screen text-white p-5">
        <h1 class="text-2xl font-bold mb-10 text-center">Cosmetics ✨</h1>
        
        <nav class="space-y-4">
            <a href="admin_dashboard.php" class="block p-3 hover:bg-pink-600 transition rounded">
                <i class="fas fa-chart-line mr-2"></i> Dashboard
            </a>
            
            <a href="admin_produk.php" class="block p-3 bg-pink-800 rounded shadow">
                <i class="fas fa-box mr-2"></i> Data Produk
            </a>
            
            <a href="admin_pesanan.php" class="block p-3 ...">
    <i class="fas fa-shopping-bag mr-3"></i> Pesanan
</a>

<a href="admin_pelanggan.php" class="block p-3 ...">
    <i class="fas fa-users mr-3"></i> Pelanggan
</a>

            <div class="pt-10">
                <a href="index.php" target="_blank" class="block p-3 hover:bg-pink-500 transition rounded text-sm italic border-t border-pink-400">
                    <i class="fas fa-external-link-alt mr-2"></i> Lihat Toko (User)
                </a>
            </div>
        </nav>
    </div>

    <div class="flex-1 p-10">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Daftar Produk</h2>
            <a href="tambah_produk.php" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg shadow-md transition font-bold">
                <i class="fas fa-plus mr-2"></i> Tambah Produk
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="p-4 font-bold text-gray-600">ID</th>
                        <th class="p-4 font-bold text-gray-600">Nama Produk</th>
                        <th class="p-4 font-bold text-gray-600">Harga</th>
                        <th class="p-4 font-bold text-gray-600">Stok</th>
                        <th class="p-4 text-center font-bold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = mysqli_query($conn, "SELECT * FROM produk");
                    if(mysqli_num_rows($query) > 0) {
                        while($row = mysqli_fetch_assoc($query)) :
                    ?>
                    <tr class="hover:bg-gray-50 transition border-b border-gray-100">
                        <td class="p-4 text-gray-500">#<?= $row['id_produk']; ?></td>
                        <td class="p-4 font-semibold text-gray-800"><?= $row['nama_produk']; ?></td>
                        <td class="p-4 text-pink-600 font-bold">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td class="p-4">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-bold">
                                <?= $row['stok']; ?> pcs
                            </span>
                        </td>
                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="edit_produk.php?id=<?= $row['id_produk']; ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow text-sm transition">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="admin_produk.php?hapus=<?= $row['id_produk']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow text-sm transition">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                        endwhile; 
                    } else {
                        echo "<tr><td colspan='5' class='p-10 text-center text-gray-400 italic'>Belum ada produk. Klik 'Tambah Produk' untuk mengisi data.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>