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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Nasabah</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<!-- ... (sebelumnya kode HTML) ... -->

<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Data Nasabah</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Password</th>
                    <th>Shift</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Sisipkan kode PHP untuk menampilkan data dari database
                $conn = connectDatabase();
                $query = "SELECT * FROM customers";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['shift'] . "</td>";
                        
                        // Tambah tombol untuk hapus dengan mengirimkan parameter ID
                        echo "<td><a href='hapusData.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a></td>";
                        
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data nasabah.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-success">Kembali Ke Halaman Input Data</a>
    </div>
</body>



</html>
