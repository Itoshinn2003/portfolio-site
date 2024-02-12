<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-aft.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/74c5d19f57.js" crossorigin="anonymous"></script>
    <title>Iwitter</title>
</head>
<body >
<header class="bg-dark text-white text-center py-3">
    <p class="fs-3">Iwitter</p>
</header>
<main>
    <?php 
    $pdo=new PDO('mysql:host=localhost;dbname=iwitter;charset=utf8','itsn','Moco0309');
    
    $sql=$pdo->prepare('SELECT *
        FROM iwitteruser as a
        INNER JOIN  profile  as b
        ON a.userid = b.iwitteruser_userid
        WHERE a.userid = ? ;');
    $sql->execute([$_REQUEST['id']]);
    
    ?>
    <?php foreach($sql as $row): ?>
    <div class="container p-5  bg-white rounded">
        <h1 class="fst-italic mb-5">DM</h1>
        <h3>ダイレクトメッセージ</h3>
        <div class="row">
            <div class="col-md-7  ">
                <div class="border border-success">
                <h4 class="bg-success text-white p-2">いとしん</h4>
                <div class="message-box m-4">
                <div class="d-flex  align-items-center">
                    <img class="profile__img" src="img/top.jpeg">
                    <p class="message bg-success text-white ms-2 p-2 rounded">こんにちは</p>
                </div>
                <div class="d-flex  flex-row-reverse align-items-center">
                    <img class="profile__img ms-2" src="img/top.jpeg">
                    <p class="message bg-success text-white  p-2 rounded">こんにちは</p>
                </div>
                </div>
                
                <form action="message.php" class="m-4">
                    <div class="input-group">
                        <input  class="form-control " name='private-message'>
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-success" >送信</button>
                        </span>
                    </div>
                </form>

                </div>
                
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4  " >
               
                    <div class="sidebar bg-light rounded p-4" >
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                        <ul class="list-group list-group-flush fs-4  mt-5">
                            <li class="list-group-item"><a href="home.php">投稿一覧</a></li>
                            <li class="list-group-item"><a href="profile.php">プロフィール</a></li>
                            
                            <li class="list-group-item bg-success  "><a class="text-white" href='create.php'>投稿する</a></li>
                          </ul>
                    </div>
                
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</main>
<footer class="text-center bg-dark text-white py-1">
    <small>© Iwitter 2023</small>
</footer>
</body>
</html>