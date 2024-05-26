<?php
    include_once 'conn.php';
    session_start();
    if(!$_SESSION['logged']){
        echo "<script>alert('로그인 정보가 없습니다!')</script>";
        echo "<script>location.href='login.html';</script>";
    }
    $name = $_SESSION['name'];
    $num = $_SESSION['num'];
    $content = $_GET['content'];
    echo $content;

    $sql = "INSERT INTO noticeboard (name, num, content) VALUES ('$name', $num, '$content')";
    if($conn->query($sql)){
        echo "<script>location.href='noticeboard.php';</script>";
    }
    else{
        echo "<script>alert('다시 시도해주세요');</script>";
        echo "<script>location.href='noticeboardwrite.html';</script>";
    }
?> 