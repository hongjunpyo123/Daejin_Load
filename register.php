<?php
    include_once("conn.php");

    $email = $_POST['email'] ?? 0;
    $num = $_POST['num'] ?? 0;
    $pwd = $_POST['pwd'] ?? 0;
    $name = $_POST['name'] ?? 0;
    $today = date("Y/m/d") ?? 0; //컴퓨터의 현재 날짜 년/월/일 형식으로 읽어오기
?>