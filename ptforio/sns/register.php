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
            <a  href="index.html" >Iwitter</p>
                <div class='p-3 rounded bg-primary'>
                <a href="login.html" > ログイン</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid d-flex align-items-center justify-content-center">
        
        <form action="register-output.php" method="post">
            <h2 >Iwitterに登録する</h2>
            <div class="mt-5 ">
            <label for="formGroupExampleInput" class="form-label">アカウント名</label>
            <input type="text" class="form-control" id="formGroupExampleInput"  name="username" placeholder="username">
            </div>
            <div class="my-3">
                <label for="formGroupExampleInput2" class="form-label">ユーザーID</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="userid" placeholder="userid">
                </div>
            <div class="my-3">
            <label for="formGroupExampleInput3" class="form-label">メールアドレス</label>
            <input type="text" class="form-control" id="formGroupExampleInput3" name="email" placeholder="email">
            </div>
            <div class="my-3">
            <label for="formGroupExampleInput4" class="form-label">パスワード</label>
            <input type="text" class="form-control" id="formGroupExampleInput4" name="password" placeholder="password">
            <p class="form-text text-muted">パスワードは8文字以上の英文字、数字の組み合わせでご入力ください</p>
            </div>
            <div class="my-3">
            <label for="formGroupExampleInput5" class="form-label">パスワード(再入力)</label>
            <input type="text" class="form-control" id="formGroupExampleInput5" name="repassword" placeholder="password">
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-primary px-3 py-2 ">登録</button>
            </div>
            
        </form>
    </div>
    <footer class="text-center bg-dark text-white py-1">
        <small>© Iwitter 2023</small>
    </footer>
</body>