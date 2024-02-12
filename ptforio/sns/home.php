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
<main >
    <?php 
        $pdo=new PDO('mysql:host=localhost;dbname=iwitter;charset=utf8','itsn','Moco0309');
        
        
        $sql=$pdo->query('SELECT *
        FROM iwitteruser as a
        INNER JOIN post as b
        ON a.userid = b.iwitteruser_userid
        ORDER BY b.created_at DESC
        ');
    
        
        
        ?>
        
    <div class="container p-5  bg-white rounded">
        <h1 class="fst-italic mb-5">HOME</h1>
        <h3>投稿一覧</h3>
        <div class="row">
            <div class="col-md-8 border-start border-end border-success scroll-home">
                    
                    <?php foreach($sql as $row): ?>
                    <div class=" post px-2 mx-2 py-3 border-bottom  border-success">
                        <div class="d-flex justify-content-between">
                            <div class="user ">
                                <div class="d-flex  align-items-center">
                                    <img class="profile__img" src="img/top.jpeg">
                                    <p class="username fs-5 ms-2"><?php echo $row['username'] ?></p>
                                </div>
                                <small class="userid fw-lighter">@<a href="other-profile.php?id=<?php echo $row['userid'] ; ?> " ><?php echo $row['userid'] ?></a></small>
                            </div>
                            <small><?php echo $row['created_at'] ?></small>
                        </div>
                        <p class="py-3"><?php echo $row['userpost'] ?></p>
                        
                        
                        
                    </div>
                    <?php endforeach; ?>
                    
                    
               
            </div>
            <div class="col-md-4 bg-light rounded p-4">
                <section id="sidebar">
                    <div class="sidebar">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                        <ul class="list-group list-group-flush fs-4  mt-5">
                            <li class="list-group-item">投稿一覧</li>
                            <li class="list-group-item"><a href="profile.php">プロフィール</a></li>
                            
                            <li class="list-group-item bg-success "><a class="text-white" href="create.php" >投稿する</a></li>
                          </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
<footer class="text-center bg-dark text-white py-1">
    <small>© Iwitter 2023</small>
</footer>
</body>
</html>
