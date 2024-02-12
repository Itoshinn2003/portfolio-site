<?php
    session_start();
    $pdo=new PDO('mysql:host=localhost;dbname=iwitter;charset=utf8','itsn','Moco0309');
        
        if(isset($_REQUEST['post'])){
            $sql=$pdo->prepare('INSERT INTO post (iwitteruser_userid, userpost) VALUES (?, ?);');
            $sql->execute([$_SESSION['user']['userid'],$_REQUEST['post']]);

        
            header('Location: home.php');
            exit;
        
        }   
?>