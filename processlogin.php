<?php
    include('inc/db_connect.php');
    $username = $_POST['username'];
    $password = $_POST['password'];    

    try{
        $result = DB::query("SELECT * FROM users WHERE username=%s", $username);
        foreach ($result as $row){
            $hash = $row['password'];
            $uid = $row['uid'];
            $_SESSION['name'] = $row['name'];
            $passwordVerify = password_verify($password, $hash);
        }
    }catch(MeekroDBException $e){
        header('Location: /login.php?error=yes');
    }
    if($passwordVerify){
        $_SESSION['username'] = $username; 
        $_SESSION['uid'] = $uid; 
        header('Location: index.php');
    }else{
        header('Location: /login.php?error=nomatch');
    }

?>