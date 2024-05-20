<?php
include 'config.php';

// Function to execute SQL query
function executeQuery($sql) {
    global $conn;
    return $conn->query($sql);
}

// Function to fetch all records
function fetchAll($sql) {
    global $conn;
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

