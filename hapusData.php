<?php
require_once("config.php");
// Fungsi untuk membuat koneksi database
function connectDatabase() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    return $conn;
}

// Fungsi untuk menghapus data nasabah berdasarkan ID
function deleteCustomer($id) {
    $conn = connectDatabase();

    // Hapus data dari tabel customers
    $query = "DELETE FROM customers WHERE id = $id";
    $result = $conn->query($query);

    $conn->close();

    return $result;
}

// Ambil ID nasabah dari parameter URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Panggil fungsi untuk menghapus data
    $deleted = deleteCustomer($id);

    if ($deleted) {
        // Redirect kembali ke halaman customer_list.php
        header("Location: customer_list.php");
        exit();
    } else {
        echo "Error saat menghapus data.";
    }
} else {
    echo "ID nasabah tidak valid.";
}
?>
