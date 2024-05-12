<?php
session_start();
include 'conn.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT email,password FROM userinfo WHERE email ='$email' AND password = '$password'";
    $result = $conn->query($sql);

    if($result){
        $count=$result->num_rows;
        if($email == NULL || $password == NULL){
            echo "<script>alert('아이디 비밀번호를 입력해주세요')</script>";
            echo "<script>location.href='login.html';</script>";
            exit;
        }
        if($count==0){
            echo "<script>alert('아이디 또는 비밀번호가 일치하지 않습니다')</script>";
            echo "<script>location.href='login.html';</script>";
        }else{
            echo "<script>alert('로그인 성공')</script>";
            $memberinfo=$result -> fetch_array(MYSQLI_ASSOC);
            $_SESSION['email'] = $memberInfo['email'];
            $_SESSION['password'] = $memberInfo['password'];
            $_SESSION['num'] = $memberInfo['num'];

            Header("Location:register.html");
        }
    }
?>
