<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action='login.php' class="dangnhap" method='POST'> 
        Tên đăng nhập : <input type='text' name='username' /> 
        Mật khẩu : <input type='password' name='password' /> 
        <input type='submit' class="button" name="dangnhap" value='Đăng nhập' /> 
    <form> 
</body>
</html>

<?php
session_start();
if (isset($_POST['dangnhap']))
{
    $servername='localhost';
    $username='tts'; 
    $password='120802';
    $dbname = "tts"; 
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    // $username = addslashes($_POST['username']);
    // $password = addslashes($_POST['password']);
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$query = "SELECT * FROM cus WHERE username='".$username."' AND password='".$password."'";
    $query = "SELECT * FROM cus WHERE username='".$username."'";
    $result = mysqli_query($conn, $query);
    //In_band
    // if (!mysqli_num_rows($result)) {
    //     echo '<div id="respon">Tên đăng nhập hoặc mật khẩu không đúng!</div>';
    // } else{
    //     echo '<div id="respon">Xin chào <b>" '.$username .' "</b>. Bạn đã đăng nhập thành công.</div>';
    // }
    echo"$query";
    if (mysqli_num_rows($result) == 0) {
        echo '<div id="respon">Tên đăng nhập này không tồn tại</div>';
    }
    else{
        $row = mysqli_fetch_array($result);
        if ($password != $row['password']) {
            echo '<div id="respon">Mật khẩu không đúng.</div>';
        }
        else{
            echo '<div id="respon">Xin chào <b>" '.$username .' "</b>. Bạn đã đăng nhập thành công.</div>';
        }
    }

}
?>