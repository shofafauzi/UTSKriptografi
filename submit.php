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

// Fungsi untuk menangani formulir submit
function handleSubmitForm() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn = connectDatabase();

        // Ambil data dari formulir
        $nama = $conn->real_escape_string($_POST['nama']);
        $alamat = $conn->real_escape_string($_POST['alamat']);
        $password = $conn->real_escape_string($_POST['password']);
        $shift = (int)$_POST['shift'];

        // Enkripsi password menggunakan Caesar Cipher
        $encrypted_password = caesarEncrypt($password, $shift);

        // Simpan data ke database
        $query = "INSERT INTO customers (nama, alamat, password, shift) VALUES ('$nama', '$alamat', '$encrypted_password', $shift)";
        $result = $conn->query($query);

        if ($result) {
            // Redirect ke halaman customer_list.php setelah berhasil disimpan
            header("Location: customer_list.php");
            exit(); // Penting untuk menghentikan eksekusi selanjutnya setelah melakukan redirect
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

// Fungsi Caesar Cipher
function caesarEncrypt($password, $shift) {
    $encrypted_password = "";
    for ($i = 0; $i < strlen($password); $i++) {
        $char = $password[$i];
        if (ctype_alpha($char)) {
            $is_upper = ctype_upper($char);
            $char = strtolower($char);
            $encrypted_char = chr((ord($char) - ord('a') + $shift) % 26 + ord('a'));
            if ($is_upper) {
                $encrypted_char = strtoupper($encrypted_char);
            }
            $encrypted_password .= $encrypted_char;
        } else {
            $encrypted_password .= $char;
        }
    }
    return $encrypted_password;
}

// Panggil fungsi untuk menangani submit formulir
handleSubmitForm();
?>
