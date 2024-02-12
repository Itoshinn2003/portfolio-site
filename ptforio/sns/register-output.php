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
        $pdo=new PDO('mysql:host=localhost;dbname=iwitter;charset=utf8','itsn','Moco0309');
        $sql=$pdo->prepare('select * from iwitteruser where userid=? ');
        $sql->execute([$_POST['usrid']]);
        if (empty($sql->fetchAll())){
            if(empty($_POST['username'])){
                echo '<p class="fw-light">アカウント名が記入されていません</p>';
                echo '<div class="text-center mt-3">';
                echo '<a href="register.php" class="btn btn-primary   p-3">新規登録画面へ戻る</a>';
            }
            elseif(empty($_POST['userid'])){             
                echo '<p class="fw-light">ユーザーIDが記入されていません</p>';
                echo '<div class="text-center mt-3">';
                echo '<a href="register.php" class="btn btn-primary   p-3">新規登録画面へ戻る</a>';
            }
            elseif(!preg_match('/^[A-Za-z0-9]+[A-Za-z0-9_.-]*@[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/',$_POST['email'])){
                echo '<p class="fw-light">メールアドレスを正しく記入してください</p>';
                echo '<div class="text-center mt-3">';
                echo '<a href="register.php" class="btn btn-primary   p-3">新規登録画面へ戻る</a>';   
            }
            elseif(!preg_match('/^[a-zA-Z0-9]{8,20}$/', $_POST['password'])) {
                echo '<p class="fw-light">パスワードを英数字8文字以上20文字以内で記入してください</p>';
                echo '<div class="text-center mt-3">';
                echo '<a href="register.php" class="btn btn-primary   p-3">新規登録画面へ戻る</a>';   
            }
            
            elseif(!$_POST['password']==$_POST['repassword']){    
                echo '<p class="fw-light">同じパスワードを記入してください</p>';
                echo '<div class="text-center mt-3">';
                echo '<a href="register.php" class="btn btn-primary   p-3">新規登録画面へ戻る</a>';   
            }
            else{
            $sql=$pdo->prepare('insert into iwitteruser values (?,?,?,?,?)');
            $sql->execute([$_POST['userid'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['repassword'],]);

            echo '<h2 class="fw-light">Iwitterの登録に成功しました！</h2>';
            echo '<div class="text-center mt-3">';
            echo '<a href="login.php" class="btn btn-primary   p-3">ログインする</a>';
            }
        }
        else{
            echo '<p class="fw-light">すでにユーザーID:'.$_POST['userid'].'は使用されています。</p>';
            echo '<div class="text-center mt-3">';
            echo '<a href="register.php" class="btn btn-primary   p-3">新規登録画面へ戻る</a>';
        }
        
        ?>
        </div>
    </div>
        
    </div>
    <footer class="text-center bg-dark text-white py-1">
        <small>© Iwitter 2023</small>
    </footer>
</body>