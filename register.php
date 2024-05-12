<?php
session_start();
include_once("conn.php");
$email = $_POST['email'] ?? 0;
$num = $_POST['num'] ?? 0;
$password = $_POST['password'] ?? 0;
$name = $_POST['name'] ?? 0;
$today = date("Y/m/d") ?? 0; //컴퓨터의 현재 날짜 년/월/일 형식으로 읽어오기


$sql = "insert into userinfo values('$email','$num','$password','$name','$today')";
if($conn->query($sql)){
    $sql = "SELECT * FROM userinfo WHERE email ='$email' AND password = '$password'";
    $result = $conn->query($sql);

    $memberinfo = $result -> fetch_assoc();
    $_SESSION['email'] = $memberinfo['email'];
    $_SESSION['password'] = $memberinfo['password'];
    $_SESSION['num'] = $memberinfo['num'];
    $_SESSION['name'] = $memberinfo['name'];
    $num = $_SESSION['num'];
    $_SESSION["logged"] = true;
    echo "<script>alert('$name 님 반갑습니다!')</script>";
    echo "<script>location.href='main.php';</script>";
}
else {
    echo "<script>alert('회원가입 실패');</script>";
    echo "<script>location.href='login.html';</script>";
}
$conn->close();
?>
