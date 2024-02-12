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
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark py-3">
            <div class="container fs-4 fst-italic text-center">
            <a  href="index.php" >Iwitter</p>
                <div class='p-3 rounded bg-primary'>
                <a href="register.php" > 新規登録</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid d-flex align-items-center justify-content-center bg-light">
        
        <form action="login-output.php" method="post" class="bg-white p-5 rounded ">
            <h2 class="fw-light">Iwitterにログイン</h2>
            <div class="mt-5 ">
            <label for="formGroupExampleInput" class="form-label">ユーザーID</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="userid" placeholder="userid">
            </div>
            <div class="my-3">
            <label for="formGroupExampleInput2" class="form-label">パスワード</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="password" placeholder="password">
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary px-3 py-2 ">ログイン</button>
            </div>
            
        </form>
    </div>
    <footer class="text-center bg-dark text-white py-1">
        <small>© Iwitter 2023</small>
    </footer>
</body>