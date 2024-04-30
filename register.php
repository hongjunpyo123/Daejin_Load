<?php
include_once("conn.php");

$email = $_POST['email'] ?? 0;
$num = $_POST['num'] ?? 0;
$pwd = $_POST['pwd'] ?? 0;
$name = $_POST['name'] ?? 0;
$today = date("Y/m/d") ?? 0; //컴퓨터의 현재 날짜 년/월/일 형식으로 읽어오기
$sql = "insert into userinfo values('$email','$num','$pwd','$name','$today')";
if($conn->query($sql)){
    //echo "회원등록 성공<br>";
    #페이지 이동하기
    //header("Location:index.html");
    echo "<script>alert('회원가입 성공');</script>";
    echo "<script>location.href='main.html';</script>";
    }
else {
    //echo "회원등록 실패<br>";
    echo "<script>alert('회원가입 실패');</script>";
    echo "<script>location.href='login.html';</script>";
}
$conn->close();
?>
