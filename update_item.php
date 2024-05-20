<?php
include 'db.php';

$id = $_GET['id'];
$item = fetchAll("SELECT * FROM barang WHERE id_barang = $id")[0];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $satuan_barang = $_POST['satuan_barang'];
    $harga_beli = $_POST['harga_beli'];
    $status_barang = isset($_POST['status_barang']) ? 1 : 0;

    $sql = "UPDATE barang SET
            kode_barang = '$kode_barang',
            nama_barang = '$nama_barang',
            jumlah_barang = $jumlah_barang,
            satuan_barang = '$satuan_barang',
            harga_beli = $harga_beli,
            status_barang = $status_barang
            WHERE id_barang = $id";
    executeQuery($sql);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2; /* jadi warna putih ke abu abuan */
        }
    </style>
</head>
<body style="background-color: #d1ecf1;"> <!-- rubah background sesuai dengan index.php -->
<div class="container">
    <h1 class="mt-4">Update Barang</h1>
    <form action="update_item.php?id=<?= $id ?>" method="post">
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?= $item['kode_barang'] ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $item['nama_barang'] ?>" required>
        </div>
        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?= $item['jumlah_barang'] ?>" required>
        </div>
        <div class="form-group">
            <label for="satuan_barang">Satuan Barang</label>
            <select class="form-control" id="satuan_barang" name="satuan_barang">
                <option value="kg" <?= $item['satuan_barang'] == 'kg' ? 'selected' : '' ?>>kg</option>
                <option value="pcs" <?= $item['satuan_barang'] == 'pcs' ? 'selected' : '' ?>>pcs</option>
                <option value="liter" <?= $item['satuan_barang'] == 'liter' ? 'selected' : '' ?>>liter</option>
                <option value="meter" <?= $item['satuan_barang'] == 'meter' ? 'selected' : '' ?>>meter</option>
            </select>
        </div>
        <div class="form-group">
            <label for="harga_beli">Harga Beli</label>
            <input type="number" step="0.01" class="form-control" id="harga_beli" name="harga_beli" value="<?= $item['harga_beli'] ?>" required>
        </div>
        <div class="form-group">
            <label for="status_barang">Status Barang</label>
            <input type="checkbox" id="status_barang" name="status_barang" value="1" <?= $item['status_barang'] ? 'checked' : '' ?>> Available
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
