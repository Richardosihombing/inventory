<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $satuan_barang = $_POST['satuan_barang'];
    $harga_beli = $_POST['harga_beli'];
    $status_barang = isset($_POST['status_barang']) ? 1 : 0;

    $sql = "INSERT INTO barang (kode_barang, nama_barang, jumlah_barang, satuan_barang, harga_beli, status_barang)
            VALUES ('$kode_barang', '$nama_barang', $jumlah_barang, '$satuan_barang', $harga_beli, $status_barang)";
    executeQuery($sql);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #d1ecf1; /* rubah background sesuai dengan index.php */
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mt-4">Tambah Barang</h1>
    <form action="add_item.php" method="post">
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
        </div>
        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" required>
        </div>
        <div class="form-group">
            <label for="satuan_barang">Satuan Barang</label>
            <select class="form-control" id="satuan_barang" name="satuan_barang">
                <option value="kg">kg</option>
                <option value="pcs">pcs</option>
                <option value="liter">liter</option>
                <option value="meter">meter</option>
            </select>
        </div>
        <div class="form-group">
            <label for="harga_beli">Harga Beli</label>
            <input type="number" step="0.01" class="form-control" id="harga_beli" name="harga_beli" required>
        </div>
        <div class="form-group">
            <label for="status_barang">Status Barang</label>
            <input type="checkbox" id="status_barang" name="status_barang" value="1"> Available
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
