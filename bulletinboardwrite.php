<?php
    include_once 'conn.php';
    session_start();
    if(!$_SESSION['logged']){
        echo "<script>alert('로그인 정보가 없습니다!')</script>";
        echo "<script>location.href='login.html';</script>";
    }
    $name = $_SESSION['name'];
    $num = $_SESSION['num'];
    $today = date("Y/m/d");
    $content = $_POST['content'];
    $title = $_POST['title'];

    if(mb_strlen($content) > 100 || mb_strlen($title) > 20){
        echo "<script>alert('글자수가 초과되었습니다');</script>";
        echo "<script>location.href='bulletinboardwrite.html';</script>";
        exit;
    }

    $sql = "INSERT INTO bulletinboard (name, num, today, content, title) VALUES ('$name', $num, '$today', '$content', '$title')";
    if($conn->query($sql)){
        echo "<script>location.href='bulletinboard.php';</script>";
    }
    else{
        echo "<script>alert('다시 시도해주세요');</script>";
        echo "<script>location.href='bulletinboardwrite.html';</script>";
    }
?> 