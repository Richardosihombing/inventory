<?php
include 'db.php';
$items = fetchAll("SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f2f2f2; 
        }
        table th, table td {
            color: #000000; 
        }
        .btn-primary:hover {
            background-color: #343a40; 
            transition: background-color 0.5s;
        }
        .bg-dark-subtle {
            background-color: #d1ecf1;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
    <script>
        $(document).ready(function(){
             alert('Data berhasil diupdate! Silahkan cek kembali inventaris barang Anda.');
        });
        function confirmDelete() {
            return confirm('Ingin Menghapus Data?');
        }
    </script>
</head>
<body class="bg-dark-subtle"> <!-- rubah warna background menjadi .bg-info-subtle dari bootstrap -->
<div class="container">
    <h1 class="mt-4"><strong>Inventory Barang</strong></h1>
    <a href="add_item.php" class="btn btn-primary mb-3">Tambah Barang</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Harga Beli</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>   
                <td><?= $item['kode_barang'] ?></td>
                <td><?= $item['nama_barang'] ?></td>
                <td><?= $item['jumlah_barang'] ?></td>
                <td><?= $item['satuan_barang'] ?></td>
                <td>Rp <?= number_format($item['harga_beli'], 0, ',', '.') ?></td>
                <td><?= $item['status_barang'] ? 'Available' : 'Not Available' ?></td>
                <td>
                    <a href="update_item.php?id=<?= $item['id_barang'] ?>" class="btn btn-warning">Update</a>
                    <a href="delete_item.php?id=<?= $item['id_barang'] ?>" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
