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
        <h1 class="fst-italic mb-5">PROFILE</h1>
        <h3>プロフィール</h3>
        <div class="row">
            <div class="col-md-7  ">
                <div class="profile border border-success rounded p-4">
                <div class="d-flex justify-content-between">
                <div class="fs-5 fw-bold">
                    <p><span class="fw-light">アカウント名：</span><?php echo $row['username'] ?></p>
                    <p><span class="fw-light">ユーザーID:</span> @<?php echo $row['userid'] ?></p>
                </div>
                <img class="profile__big" src="img/top.jpeg">
                </div>
                <p class="fst-italic">follow <span class="fw-bold">0</span> | follower <span class="fw-bold">0</span></p>
                <div class="d-flex flex-row my-3">
                <div class="p-2 bg-success text-white rounded me-4">フォローする</div>
                <a class="p-2 bg-success rounded text-white" href="message.php?id=<?php echo $row['userid'] ; ?>">メッセージ</a>
                
                </div>
                
                <p class="my-4 py-4 border-top "><?php echo $row['message'] ?></p>
                </div>

                <h4 class="my-5"><?php echo $row['username'] ?>の投稿一覧</h4>
                <div class="scroll border border-success rounded mypost">
                
                <?php 
                    $sql=$pdo->prepare('SELECT *
                    FROM iwitteruser as a
                    INNER JOIN  post  as b
                    ON a.userid = b.iwitteruser_userid
                    WHERE a.userid = ? 
                    ORDER BY b.created_at DESC ;');
                    $sql->execute([$row['userid']]);
                    $user_profile = $sql->fetch(PDO::FETCH_ASSOC);
                    if(!($user_profile)){
                        echo '<p class="fs-3 text-center mt-5">まだ投稿がありません</p>';
                    }
                    foreach($sql as $row):
                ?>
                <div class=" post px-4 mx-2 py-3 border-bottom  border-success">
                    
                    <div class="d-flex justify-content-between">
                        
                        <div class="user ">
                            <div class="d-flex  align-items-center">
                                <img class="profile__img" src="img/top.jpeg">
                                <p class="username fs-5 ms-2"><?php echo $row['username'] ?></p>
                            </div>
                            <small class="userid fw-lighter">@<?php echo $row['userid'] ?></small>
                        </div>
                        <small><?php echo $row['created_at'] ?></small>
                    </div>
                    <p class="py-3"><?php echo $row['userpost'] ?></p>
                    <p><i class="fa-regular fa-heart"></i></p>
                </div>
                <?php endforeach; ?>
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