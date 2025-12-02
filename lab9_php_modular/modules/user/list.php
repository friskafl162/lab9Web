<?php
require __DIR__ . '/../../config/database.php';
require __DIR__ . '/../../views/header.php';

$sql = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $sql);
?>

<h2>Data Handphone</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><img src="../../gambar/<?= $row['gambar'] ?>" width="80"></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['kategori'] ?></td>
        <td><?= $row['harga_jual'] ?></td>
        <td><?= $row['harga_beli'] ?></td>
        <td><?= $row['stok'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id_barang'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id_barang'] ?>">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php require __DIR__ . '/../../views/footer.php'; ?>
