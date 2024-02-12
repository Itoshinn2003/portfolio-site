<?php session_start() ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-bef.css">
    
    <title>Iwitter</title>
</head>
<body>
    <header class="bg-dark text-white text-center py-3">
        <p class="fs-3">Iwitter</p>
    </header>
    <div class="container-fluid d-flex align-items-center justify-content-center bg-light">
    <div class="bg-white p-5 rounded ">
        <?php 
        unset($_SESSION['user']);
        $pdo=new PDO('mysql:host=localhost;dbname=iwitter;charset=utf8','itsn','Moco0309');
        $sql=$pdo->prepare('select * from iwitteruser where userid=? and password=?');
        $sql->execute([$_POST['userid'],$_POST['password']]);
        $user = $sql->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $_SESSION['user']=[
                'userid'=>$user['userid'],
                'username'=>$user['username'],
                'email'=>$user['email'],
                'password'=>$user['password'],
                'repassword'=>$user['repassword'] // What is this? Consider removing if not needed.
            ];
        }
        if(isset($_SESSION['user'])){
            echo '<h2 class="fw-light">'.$_SESSION['user']['username'].'さん、Iwitterへようこそ！</h2>';
            echo '<div class="text-center mt-3">';
            echo '<a href="home.php" class="btn btn-primary   p-3">ホームへ</a>';
        }
        else{
            echo '<p class="fw-light">ユーザーIDまたはパスワードが違います</p>';
            echo '<div class="text-center mt-3">';
            echo '<a href="login.php" class="btn btn-primary   p-3">ログイン画面へ戻る</a>';
        }
        
        
        ?>
        </div>
    </div>
        
    </div>
    <footer class="text-center bg-dark text-white py-1">
        <small>© Iwitter 2023</small>
    </footer>
</body>