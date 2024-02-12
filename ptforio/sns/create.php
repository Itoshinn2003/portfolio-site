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
<main >
    <div class="container p-5  bg-white rounded">
        <h1 class="fst-italic mb-5">CREATE</h1>
        <h3>投稿する</h3>
        <div class="row">
            <div class="col-md-7 border border-success rounded py-4 bg-light">
                <form action="redirect.php" class="mt-5">
                    <textarea class="form-control my-5" name='post' style="height: 200px" ></textarea>
                     <input type="submit" class="btn btn-primary" value="投稿">
                </form>
                   
               
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4 bg-light rounded p-4">
                <section id="sidebar">
                    <div class="sidebar">
                        <form class="d-flex">
                            <input class="form-control me-2"  type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                        <ul class="list-group list-group-flush fs-4  mt-5">
                            <li class="list-group-item"><a href="home.php">投稿一覧</a></li>
                            <li class="list-group-item"><a href="profile.php">プロフィール</a></li>
                            
                            <li class="list-group-item bg-success  green-url"><a class='text-white' href="create.php">投稿する</a></li>
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