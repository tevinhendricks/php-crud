<?php
session_start();
include_once("db_conn.php");

if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($date){
        $data = trim($date);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['uname']);
$password = validate($_POST['password']);

if(empty($uname)){
    header('Location: index.php?error=Username is required');
    exit();
}
else if(empty($password)){
    header('Location: index.php?error=Password is required');
    exit();
}

$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$password' ";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['user_name'] === $uname && $row['password'] === $password){
        echo "Logged In!";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: home.php");
        exit();
    }else{
        header('Location: index.php?error=Inccorect Usernma eor Password');
    }
}else{
    header("Location: index.php");
    exit();
}