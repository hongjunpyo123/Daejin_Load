<?php
include_once("conn.php"); 
session_start();
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$sql = "delete from userinfo where email = '$email'";
if($conn->query($sql)){
    $_SESSION['logged'] = false;
    $conn->query("delete from noticeboard where name = '$name'");
    session_destroy();
    echo "<script>alert('회원 탈퇴 성공')</script>";
    echo "<script>location.href='login.html'</script>";
}
else{
    echo "<script>alert('회원 탈퇴 실패')</script>";
    echo "<script>location.href='main.php'</script>";
}