<?php 
require 'functions.php';
if(isset($_POST["signup"])){
    $signup = signup($_POST);
    if($signup === true){
        echo "<script>
                alert('Berhasil registrasi!');
                document.location.href = 'login.php';
              </script>";
    }
    elseif($signup === "usernameTidakBolehKosong"){
        $uk = true;
    }
    elseif($signup === "usernameSudahAda"){
        $ua = true;
    }
    elseif($signup === "passwordTidakBolehKosong"){
        $pk = true;
    }
    elseif($signup === "konfirmasiPasswordSalah"){
        $kp = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN SIGN UP</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container p-3">
        <div class="card">
            <div class="card-header bg-dark text-light">
                <h1 class="text-center fst-italic fw-bold">SILAHKAN SIGN UP</h1>
            </div>
            <div class="card-body bg-light">
                <form action="" method="post">
                    <ul class="pe-2 ps-2">
                        <li class="list-unstyled">
                            <label for="username" class="fw-bold">Username :</label>
                            <input type="text" name="username" id="username" required autocomplete="off" value="<?php if(isset($_POST["signup"])) {echo $_POST["username"];}?>" class="form-control">
                            <?php if(isset($ua)) :?>
                                <p class="fst-italic text-danger position-absolute">Username sudah ada!</p>
                            <?php endif; ?>
                            <?php if(isset($uk)) :?>
                                <p class="fst-italic text-danger position-absolute">Username tidak boleh hanya kosong/spasi!</p>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <ul class="pe-2 ps-2">
                        <li class="list-unstyled">
                            <label for="password" class="fw-bold">Password :</label>
                            <input type="password" name="password" id="password" required autocomplete="off" value="<?php if(isset($_POST["signup"])) {echo $_POST["password"];}?>" class="form-control">
                            <?php if(isset($pk)) :?>
                                <p class="fst-italic text-danger position-absolute">Password tidak boleh hanya kosong/spasi!</p>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <ul class="pe-2 ps-2">
                        <li class="list-unstyled">
                            <label for="password2" class="fw-bold">Konfirmasi password :</label>
                            <input type="password" name="password2" id="password2" class="form-control" required autocomplete ="off" value="<?php if(isset($_POST["signup"])) {echo $_POST["password2"];}?>">
                            <?php if(isset($kp)) :?>
                                <p class="fst-italic text-danger position-absolute">Konfirmasi password salah!</p>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <ul class="pe-2 ps-2">
                        <li class="list-unstyled text-end">
                            <a href="sign_in.php" class="btn btn-warning">Log In</a>
                            <button type="submit" name="signup" class="btn btn-success">Sign Up</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>
</html>