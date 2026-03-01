<?php 
// koneksi ke database
$conn = mysqli_connect("localhost","root","","phpdasar");
// function tampil
function tampil($select){
    global $conn;
    $result = mysqli_query($conn,$select);
    $mhs = [];
    while($mahasiswa = mysqli_fetch_assoc($result)){
        $mhs[] = $mahasiswa;
    }
    return $mhs;
}
// function tambah
function tambah($data){
    global $conn;
    $nama = htmlentities($data["nama"]);
    $nrp = htmlentities($data["nrp"]);
    $email = htmlentities($data["email"]);
    $jurusan = htmlentities($data["jurusan"]);
    $gambar = upload();
    // jika gambar tidak ada 
    if(!$gambar){
        return false;
    }
    $insert = "INSERT INTO mahasiswa
               VALUES 
               ('','$nama','$nrp','$email','$jurusan','$gambar');
               ";
    mysqli_query($conn,$insert);
    return mysqli_affected_rows($conn);
}
// function upload
function upload(){
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $tmp = $_FILES["gambar"]["tmp_name"];
    // cek ekstesi gambar
    $ektensiGambarValid = ["jpg","jpeg","png"];
    $ektensiGambar = explode('.',$namaFile);
    $ektensiGambar = strtolower(end($ektensiGambar));
    // cek apakah ekstensi gambar tidak sah
    if(!in_array($ektensiGambar,$ektensiGambarValid)){
        echo "<script>alert('Ekstensi gambar tidak valid!');</script>";
        return false;
    }
    // cek ukuran file
    if($ukuranFile > 1000000){
        echo "<script>alert('Ukuran gambar maksimal 1 mb!');</script>";
        return false;
    }
    // generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ektensiGambar;
    // pindahkan ke folder img
    move_uploaded_file($tmp,'img/' . $namaFileBaru);
    return $namaFileBaru;
}
// function delete
function delete($id){
    global $conn;
    $delete = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($conn,$delete);
   return mysqli_affected_rows($conn);
}
// function edit
function edit($data){
    global $conn;
    $id = htmlentities($data["id"]);
    $gambarLama = $data["gambarLama"];
    $nama = htmlentities($data["nama"]);
    $nrp = htmlentities($data["nrp"]);
    $email = htmlentities($data["email"]);
    $jurusan = htmlentities($data["jurusan"]);
    // cek apakah gambar di tidak ganti
    if($_FILES["gambar"]["error"] === 4){
        $gambar = $gambarLama;
    }
    else{
        $gambar = upload();
    }
    $update = "UPDATE mahasiswa
               SET
               nama = '$nama',
               nrp = '$nrp',
               email = '$email',
               jurusan = '$jurusan',
               gambar = '$gambar'
               WHERE id = $id
              ";
    mysqli_query($conn,$update);
    return mysqli_affected_rows($conn);
}
// function login
function login($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = $data["password"];
    $select = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn,$select);
    // cek username
    if(mysqli_num_rows($result) === 1){
        $user = mysqli_fetch_assoc($result);
        // cek password
        if(password_verify($password,$user["password"])){
            $_SESSION["login"] = true;
            // cek apakah remember di ceklis
            if(isset($_POST["remember"])){
                setcookie('key1',$user["id"],time()+60*60*24);
                setcookie('key2',hash('sha256',$user["username"]),time()+60*60*24);
            }
            header("location:index.php");
            exit;
        }
        return "passwordSalah";
    }
    return "usernameTidakAda";
}
// function signup
function signup($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    $select = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($conn,$select);
    if(mysqli_num_rows($result) === 1){
        return "usernameSudahAda";
    }
    if(empty(trim($username))){
        return "usernameTidakBolehKosong";
    }
    if(empty(trim($password))){
        return "passwordTidakBolehKosong";
    }
    if($password !== $password2){
        return "konfirmasiPasswordSalah";
    }
    $insert = "INSERT INTO users
              (username,password)
              VALUES
              ('$username','$password')
              ";
    mysqli_query($conn,$insert);
    return true;
}
?>