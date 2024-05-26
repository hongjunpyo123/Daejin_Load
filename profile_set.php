<?php
        session_start();
        include_once 'conn.php';
        if(!$_SESSION['logged']){
            echo "<script>alert('로그인 정보가 없습니다!')</script>";
            echo "<script>location.href='login.html';</script>";
        }
        $email = $_SESSION['email'];
        $num = $_SESSION['num'];
        $password = $_SESSION['password'];
        $name = $_SESSION['name'];

        $email_post = $_POST['email'];
        $num_post = $_POST['num'];
        $password_post = $_POST['password'];
        $name_post = $_POST['name'];

        $sql = "update userinfo set email = '$email_post', num = '$num_post', password = '$password_post', name = '$name_post' WHERE email = '$email' AND num = '$num' AND password = '$password' AND name = '$name'";
        if($conn->query($sql)){
            $_SESSION['email'] = $email_post;
            $_SESSION['num'] = $num_post;
            $_SESSION['password'] = $password_post;
            $_SESSION['name'] = $name_post;
            echo "<script>alert('회원정보가 수정되었습니다')</script>";
            echo "<script>location.href='main.php';</script>";
        }else{
            echo "<script>alert('다시 시도해주세요')</script>";
            echo "<script>location.href='profile.php';</script>";
        }
?> 