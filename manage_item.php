<?php
include 'db.php';

$id = $_GET['id'];
$action = $_GET['action']; // 'add' or 'reduce'
$amount = $_GET['amount']; // the amount to add or reduce

$item = fetchAll("SELECT jumlah_barang FROM barang WHERE id_barang = $id")[0];
$new_amount = $item['jumlah_barang'] + ($action == 'add' ? $amount : -$amount);

$sql = "UPDATE barang SET jumlah_barang = $new_amount WHERE id_barang = $id";
executeQuery($sql);

header('Location: index.php');

