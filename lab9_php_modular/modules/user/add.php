<?php
require __DIR__ . '/../../config/database.php';
require __DIR__ . '/../../views/header.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $gambar = $_FILES['gambar']['name'];

    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../gambar/" . $gambar);

    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar)
            VALUES ('$nama','$kategori', '$harga_jual', '$harga_beli', '$stok', '$gambar')";
    mysqli_query($conn, $sql);

    header("Location: list.php");
}
?>

<h2>Tambah Handphone</h2>

<form method="POST" enctype="multipart/form-data">
    <label>Nama</label><br>
    <input type="text" name="nama"><br><br>

    <label>Kategori</label><br>
    <select name="kategori">
        <option>Elektronik</option>
        <option>Hand Phone</option>
    </select><br><br>

    <label>Harga Jual</label><br>
    <input type="number" nam<?php
error_reporting(E_ALL);
include_once __DIR__ . '/../../config/database.php';

global $conn;
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'] ?? null;
    $gambar = null;

    if ($file_gambar && $file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destDir = dirname(__DIR__, 2) . '/gambar/';
        if (!is_dir($destDir)) { @mkdir($destDir, 0777, true); }
        $destination = $destDir . $filename;
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = 'gambar/' . $filename;
        }
    }

    $sql = 'INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) ' .
           "VALUE ('{$nama}', '{$kategori}','{$harga_jual}','{$harga_beli}', '{$stok}', '{$gambar}')";
    $result = mysqli_query($conn, $sql);
    header('location: index.php?page=user/list');
    exit;
}
?>
<main>
    <h2>Tambah Barang</h2>
    <div class="main">
        <form method="post" action="index.php?page=user/add" enctype="multipart/form-data">
            <div class="input">
                <label>Nama Barang</label>
                <input type="text" name="nama" required />
            </div>
            <div class="input">
                <label>Kategori</label>
                <select name="kategori">
                    <option value="Komputer">Komputer</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Hand Phone">Hand Phone</option>
                </select>
            </div>
            <div class="input">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" />
            </div>
            <div class="input">
                <label>Harga Beli</label>
                <input type="number" name="harga_beli" />
            </div>
            <div class="input">
                <label>Stok</label>
                <input type="number" name="stok" />
            </div>
            <div class="input">
                <label>File Gambar</label>
                <input type="file" name="file_gambar" />
            </div>
            <div class="submit">
                <input type="submit" class="btn btn-brand btn-lg" name="submit" value="Simpan" />
            </div>
        </form>
    </div>
</main>e="harga_jual"><br><br>

    <label>Harga Beli</label><br>
    <input type="number" name="harga_beli"><br><br>

    <label>Stok</label><br>
    <input type="number" name="stok"><br><br>

    <label>Gambar</label><br>
    <input type="file" name="gambar"><br><br>

    <button type="submit" name="submit">Simpan</button>
</form>

<?php require __DIR__ . '/../../views/footer.php'; ?>
