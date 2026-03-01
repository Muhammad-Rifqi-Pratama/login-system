<?php 
require 'functions.php';
$id = $_GET["id"];
if(empty($id)){
    header('location:index.php');
    exit;
}
$mahasiswa = tampil("SELECT * FROM mahasiswa WHERE id = $id")[0];
// cek apakah tombol tambah sudah di tekan
if(isset($_POST["edit"])){
    if(edit($_POST) > 0){
        echo "<script>
                alert('Data berhasil di edit!');
                document.location.href = 'index.php';
             </script>";
    }
    else{
        echo "<script>alert('Data gagal di edit!');</script>";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN TAMBAH</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container p-3">

        <div class="card">
            <div class="card-header bg-dark text-light">
                <h1 class="text-center fst-italic fw-bold">TAMBAH DATA MAHASISWA</h1>
            </div>
            <div class="card-body bg-light">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $mahasiswa["id"];?>">
                    <input type="hidden" name="gambarLama" value="<?= $mahasiswa["gambar"];?>">
                    <ul class="pe-3 ps-3">
                        <li class="list-unstyled">
                            <label for="nama" class="fw-bold">Nama :</label>
                            <input type="text" name="nama" id="nama" class="form-control" required autocomplete="off" autofocus value="<?= $mahasiswa["nama"];?>">
                        </li>
                    </ul>
                    <ul class="pe-3 ps-3">
                        <li class="list-unstyled">
                            <label for="nrp" class="fw-bold">Nrp :</label>
                            <input type="number" name="nrp" id="nrp" class="form-control" required autocomplete="off" value="<?= $mahasiswa["nrp"];?>">
                        </li>
                    </ul>
                    <ul class="pe-3 ps-3">
                        <li class="list-unstyled">
                            <label for="email" class="fw-bold">Email :</label>
                            <input type="email" name="email" id="email" class="form-control" required autocomplete="off" value="<?= $mahasiswa["email"];?>">
                        </li>
                    </ul>
                    <ul class="pe-3 ps-3">
                        <li class="list-unstyled">
                            <label for="jurusan" class="fw-bold">Jurusan :</label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control" required autocomplete="off" value="<?= $mahasiswa["jurusan"];?>">
                        </li>
                    </ul>
                    <ul class="pe-3 ps-3">
                        <li class="list-unstyled">
                            <label for="gambar" class="fw-bold d-block">Gambar :</label>
                            <img src="img/<?= $mahasiswa["gambar"];?>" alt="mahasiswa" class="d-block mb-1" width="70px" height="70px">
                            <input type="file" name="gambar" id="gambar">
                        </li>
                    </ul>
                    <ul class="pe-3 ps-3">
                        <li class="list-unstyled text-end">
                            <a href="index.php" class="btn btn-danger">Kembali</a>
                            <button type="submit" name="edit"class="btn btn-success">Edit data!</button>
                        </li>
                    </ul>
                </form>
           </div>
        </div>
    </div>
</body>
</html>