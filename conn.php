<?php
# DB 서버 접속처리
$server = "localhost"; //MySQL 서버가 동작하는 호스트 주소
$user = "root";
$password = "";
$dbname = "userdata";  

$conn = new mysqli($server, $user, $password, $dbname);

?>