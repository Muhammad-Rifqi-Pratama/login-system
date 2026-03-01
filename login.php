<?php 
require 'functions.php';
session_start();
// cek cookie
if(isset($_COOKIE["key1"]) && isset($_COOKIE["key2"])){
    $key1 = $_COOKIE["key1"];
    $key2 = $_COOKIE["key2"];
    $select = "SELECT * FROM users WHERE id = $key1";
    $result = mysqli_query($conn,$select);
    $user = mysqli_fetch_assoc($result);
    // cek cookie
    if($key2 === hash('sha256',$user["username"])){
        $_SESSION["login"] = true;
    }
}
// jika ada session
if(isset($_SESSION["login"])){
    header("location:index.php");
    exit;
}
if(isset($_POST["login"])){
    $login = login($_POST);
    if($login === true){
        header("location:index.php");
        exit;
    }
    elseif($login === "usernameTidakAda"){
        $uta = true;
    }
    elseif($login === "passwordSalah"){
        $ps = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN LOGIN</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container p-3">
        <div class="card">
            <div class="card-header bg-dark text-light">
                <h1 class="text-center fst-italic fw-bold">SILAHKAN LOG IN</h1>
            </div>
            <div class="card-body bg-light">
                <form action="" method="post">
                    <ul class="pe-2 ps-2">
                        <li class="list-unstyled">
                            <label for="username" class="fw-bold">Username :</label>
                            <input type="text" name="username" id="username" required autocomplete="off" value="<?php if(isset($_POST["login"])) {echo $_POST["username"];}?>" class="form-control">
                            <?php if(isset($uta)) :?>
                                <p class="fst-italic text-danger position-absolute">Username tidak ada!</p>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <ul class="pe-2 ps-2">
                        <li class="list-unstyled">
                            <label for="password" class="fw-bold">Password :</label>
                            <input type="password" name="password" id="password" required autocomplete="off" value="<?php if(isset($_POST["login"])) {echo $_POST["password"];}?>" class="form-control">
                            <?php if(isset($ps)) :?>
                                <p class="fst-italic text-danger position-absolute">Password salah!</p>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <ul class="pe-2 ps-2">
                        <li class="list-unstyled">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember" class="fw-bold">Ingatkan Saya Nanti :</label>
                        </li>
                    </ul>
                    <ul class="pe-2 ps-2">
                        <li class="list-unstyled text-end">
                            <a href="signUp.php" class="btn btn-warning">Sign Up</a>
                            <button type="submit" name="login" class="btn btn-success">Log In</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>
</html>