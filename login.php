<?php
include('db.php');
session_start();

$error='';
if (!empty($_POST['user']) && !empty($_POST['pass'])){
    //mõlemad väljad täidetud
    $user=$_POST['user'];
    $pass=$_POST['pass'];

    $query = mysqli_query($connection, "select * from kasparm26_11_users where username='$user' and password='$pass'");
    $rowCount = mysqli_num_rows($query);


    if ($rowCount == 1) {
        $_SESSION['user']=$user;
        header('Location:index.php');
        exit;
        }else{
        $error='Username or password is invalid';
        }
}else{
    $error='Both fields have to be filled';
}
?>

    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>

    <body>
        <h1>Login</h1>
        <p style="color:red">
            <?=$error?>
        </p>

        <form method="post">
            <input type="text" name="user" placeholder="Username">
            <input type="password" name="pass" placeholder="Password">
            <button type="submit">Log in</button>
        </form>
    </body>

    </html>
