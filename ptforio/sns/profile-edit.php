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
    $sql->execute([$_SESSION['user']['userid']]);
    ?>
    <?php foreach($sql as $row) :?>
    <div class="container p-5  bg-white rounded">
        <h1 class="fst-italic mb-5">PROFILE</h1>
        <h3>プロフィール</h3>
        <div class="row">
            <div class="col-md-7  ">
                <form action='profile.php' method='post'>

                <div class="profile border border-success rounded p-4">
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">アカウント名</label>
                <input  class="form-control" id="exampleInputEmail1" name='username' value='<?php echo $row['username']?>'>
                </div>
                
                <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">メッセージ</label>
                <input  class="form-control" id="exampleInputEmail2" name='message' value='<?php echo $row['message']?>'>
                </div>
                <button type="submit" class="btn btn-dark text-white">確定</button>
                </div>

                
            </form>
            
           </div>
            <div class="col-md-1"></div>
            <div class="col-md-4  " >
               
                    <div class="sidebar bg-light rounded p-4" >
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                        <ul class="list-group list-group-flush fs-4  mt-5">
                            <li class="list-group-item"><a href="home.html">投稿一覧</a></li>
                            <li class="list-group-item"><a href="profile.html">プロフィール</a></li>
                            
                            <li class="list-group-item bg-success text-white ">投稿する</li>
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