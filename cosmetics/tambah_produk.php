<?php 
include 'koneksi.php'; 
if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    mysqli_query($conn, "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')");
    header("Location: admin_produk.php");
}
?>
<!DOCTYPE html>
<html>
<head><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-100 p-10">
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Tambah Kosmetik</h2>
        <form method="POST">
            <label class="block mb-2">Nama Produk</label>
            <input type="text" name="nama" class="w-full border p-2 mb-4 rounded" required>
            <label class="block mb-2">Harga</label>
            <input type="number" name="harga" class="w-full border p-2 mb-4 rounded" required>
            <label class="block mb-2">Stok</label>
            <input type="number" name="stok" class="w-full border p-2 mb-6 rounded" required>
            <button name="submit" class="w-full bg-pink-600 text-white p-2 rounded">Simpan Produk</button>
        </form>
    </div>
</body>
</html>