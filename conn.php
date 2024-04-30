<?php
# DB 서버 접속처리
$server = "localhost"; //MySQL 서버가 동작하는 호스트 주소
$user = "root";
$password = "";
$dbname = "djload";  

$conn = new mysqli($server, $user, $password, $dbname);
if($conn -> connect_error){
    echo "DB 접속 오류<br>";
}  
else{
    echo "DB  접속 성공<br>";
}
?>