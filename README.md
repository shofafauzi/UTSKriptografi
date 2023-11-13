# UTSKriptografi

### Sebelum Menggunakannya Harus Memakai Koneksi Internet Untuk Dapat Melihat tampilan layout

### Berikut penjelasan fungsi yang dipakai 

### function connectDatabase():

  Fungsi ini bertujuan untuk membuat koneksi ke database menggunakan informasi yang diberikan dalam file config.php.
  Jika koneksi gagal, fungsi ini akan menghentikan eksekusi program dan menampilkan pesan kesalahan.

### function handleSubmitForm():

  Fungsi ini akan dieksekusi hanya jika metode permintaan adalah POST, yang berarti formulir telah dikirim.
  Ambil data dari formulir seperti nama, alamat, password, dan shift.
  Enkripsi password menggunakan fungsi caesarEncrypt.
  Eksekusi query SQL untuk menyimpan data nasabah ke dalam database.
  Jika penyimpanan berhasil, pengguna akan diarahkan ke halaman customer_list.php menggunakan fungsi header().
  Jika ada kesalahan, pesan kesalahan akan ditampilkan.

### function caesarEncrypt($password, $shift):

  Fungsi ini mengenkripsi password menggunakan algoritma Caesar Cipher dengan pergeseran sebesar nilai $shift.
  Setiap karakter diubah menjadi karakter baru sesuai dengan aturan Caesar Cipher.
  Karakter yang bukan huruf tidak diubah.

  
  <h2 align="center">Thanks For Reading!!!</h2>
<div align="center">
<img src="https://user-images.githubusercontent.com/91085882/222731693-24383140-7623-4e7a-a528-6621380b7be8.gif">
