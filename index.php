<?php 
require 'functions.php';
session_start();
// jika tidak ada session
if(empty($_SESSION["login"])){
    header("location:login.php");
    exit;
}
// pagination
$jumlahDataPerhalaman = 2;
$select = "SELECT * FROM mahasiswa";
$hitungData = mysqli_query($conn,$select);
$jumlahData = mysqli_num_rows($hitungData);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
$dataPertama = ($halamanAktif -1) * $jumlahDataPerhalaman;
$mahasiswa = tampil("SELECT * FROM mahasiswa ORDER BY id DESC LIMIT $dataPertama,$jumlahDataPerhalaman");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ADMIN</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container p-3">
        <h1 class="text-center fw-bold fst-italic">DAFTAR MAHASISWA</h1>
        <div class="text-end mb-3">
            <a href="tambah.php" class="btn btn-warning mx-1">Tambah Data Mahasiswa</a>
            <a href="logout.php" class="btn btn-danger">Log Out</a>
        </div>
        <form action="" method="post" class="d-flex">
            <input type="text" name="keyword" id="keyword" class="form-control mb-3" placeholder="masukkan keyword pencarian..." autofocus autocomplete="off">
            </form>
        <div class="table-responsive" id="table">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark text-light text-center">
                    <tr>
                        <th width="60px">NO</th>
                        <th width="80px">GAMBAR</th>
                        <th width="90px">NRP</th>
                        <th width="350px">NAMA</th>
                        <th width="250px">JURUSAN</th>
                        <th width="200px">EMAIL</th>
                        <th width="120px">AKSI</th>
                    </tr>
                </thead>
                <tbody class="table-info text-center align-middle">
                    <?php $no = $dataPertama +1;?>
                    <?php foreach($mahasiswa as $mahasiswa) :?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><img src="img/<?= $mahasiswa["gambar"];?>" alt="Gambar tidak ada, silahkan edit gambar" width="70px" height="70px"></td>
                        <td><?= $mahasiswa["nrp"];?></td>
                        <td><?= $mahasiswa["nama"];?></td>
                        <td><?= $mahasiswa["jurusan"];?></td>
                        <td><?= $mahasiswa["email"];?></td>
                        <td>
                            <a href="edit.php?id=<?= $mahasiswa["id"]?>" class="btn btn-success btn-sm">edit</a>
                            <a href="delete.php?id=<?= $mahasiswa["id"];?>" class="btn btn-danger btn-sm mt-1" onclick="return confirm('Apakah anda yakin ingin menghapusnya?');">delete</a>
                        </td>
                    </tr>
                    <?php $no++;?>
                    <?php endforeach;?>
              </tbody>
            </table>
        </div>
        <!-- navigasi -->
         <ul class="pagination justify-content-center" id="nav">
            <li class="page-item">
                <?php if($halamanAktif > 1) :?>
                <a href="?halaman=<?= $halamanAktif -1?>" class="page-link bg-primary text-light">prev</a> 
                <?php else :?>
                    <a href="" class="page-link">prev</a> 
                <?php endif;?>
            </li>
            <?php for($i = 1; $i <= $jumlahHalaman; $i++) :?>
            <li class="page-item">
                <a href="?halaman=<?= $i;?>" class="page-link <?= ($i == $halamanAktif)?'active':'';?>"><?= $i;?></a>
            </li>
            <?php endfor;?>
            <li class="page-item">
                <?php if($halamanAktif < $jumlahHalaman ) :?>
                <a href="?halaman=<?= $halamanAktif +1?>" class="page-link bg-primary text-light">next</a>
                <?php else :?>
                    <a href="" class="page-link">next</a>
                <?php endif;?>
            </li>
         </ul>
    </div>
    <script src="js/script.js"></script>
</body>
</html>