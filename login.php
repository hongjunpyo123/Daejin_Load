<?php
session_start();
$_SESSION["logged"] = false;
include_once 'conn.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM userinfo WHERE email ='$email' AND password = '$password'";
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
            $memberinfo = $result -> fetch_assoc();
            $_SESSION['email'] = $memberinfo['email'];
            $_SESSION['password'] = $memberinfo['password'];
            $_SESSION['num'] = $memberinfo['num'];
            $_SESSION['name'] = $memberinfo['name'];
            $_SESSION["logged"] = true;
            $num = $_SESSION['num'];
            $name = $_SESSION['name'];
            echo "<script>alert('$name 님 반갑습니다!')</script>";
            echo "<script>location.href='main.php'</script>";
        }
    }
    $conn->close()
?>
