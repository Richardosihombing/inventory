<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM barang WHERE id_barang = $id";
executeQuery($sql);

header('Location: index.php');

