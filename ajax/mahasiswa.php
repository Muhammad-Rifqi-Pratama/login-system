<?php 
require '../functions.php';
session_start();
if(empty($_SESSION["login"])){
    header("location:../login.php");
    exit;
}
$keyword = $_GET["keyword"];
//   pagination
$jumlahDataPerhalaman = 2;
$select = "SELECT * FROM mahasiswa";
$hitungData = mysqli_query($conn,$select);
$jumlahData = mysqli_num_rows($hitungData);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
$dataPertama = ($halamanAktif -1) * $jumlahDataPerhalaman;
$select = "SELECT * FROM mahasiswa WHERE
          nama LIKE '%$keyword%' OR
          nrp LIKE '%$keyword%' OR
          jurusan LIKE '%$keyword%' OR
          email LIKE '%$keyword%'
          ";
if(empty($keyword)){
    $select = "SELECT * FROM mahasiswa ORDER BY id DESC LIMIT $dataPertama,$jumlahDataPerhalaman";
}
$mahasiswa = tampil($select);
?>
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
                    <a href="edit.php" class="btn btn-success btn-sm">edit</a>
                    <a href="" class="btn btn-danger btn-sm mt-1" onclick="return confirm('Apakah anda yakin ingin menghapusnya?');">delete</a>
                </td>
            </tr>
            <?php $no++;?>
            <?php endforeach;?>
        </table>
    </tbody>
</div>
 