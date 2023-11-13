<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Input Data Nasabah</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Input Data Nasabah</h1>
        <form method="post" action="submit.php"> 
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="shift">Shift untuk Caesar Cipher:</label>
                <input type="number" class="form-control" name="shift" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <form action="customer_list.php"> 
            <button type="submit" class="btn btn-success mt-3">Lihat Data</button>
        </form>
    </div>
</body>

</html>
