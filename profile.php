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
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보</title>
          <!-- Favicons -->
  <link href="img/symbol.png" rel="icon">
    <style>
    * {
        box-sizing: border-box
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
      height: 100vh;
            background-image: url(https://search.pstatic.net/common/?src=http%3A%2F%2Fimgnews.naver.net%2Fimage%2F5138%2F2021%2F09%2F03%2F0000316930_001_20210903203011761.png&type=sc960_832);
            background-size: cover;
            background-position: top;
            padding: 0px 0px;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    }

    hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
    }

    button {
    background-color: rgb(red, rgb(53, 223, 53), blue);
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    border-radius: 5px;
    }

    button:hover {
    opacity:1;
    }


    .cancelbtn {
        transition: background-color 0.3s ease-in-out;
        padding: 14px 20px;
        background-color: gray;
    }
    
    .cancelbtn:hover {
        transition: background-color 0.3s ease-in-out;
        background-color: rgba(255, 0, 0, 0.6);
        }

    
    .profilebtn{
    transition: background-color 0.3s ease-in-out;
    padding: 14px 20px;
    background-color: gray;
    }
    
    .profilebtn:hover {
        transition: background-color 0.3s ease-in-out;
        background-color: rgba(255, 0, 0, 0.6);
    }

    .signupbtn {
    padding: 14px 20px;
    background-color: blue;
    }

    .cancelbtn, .signupbtn {
    float: left;
    width: 50%;
    }

    /* Add padding to container elements */
    .container {
    padding: 16px;
    }

    .clearfix::after {
    content: "";
    clear: both;
    display: table;
    }

    #email,#password,#num,#name{
        transition: background-color 0.5s ease-in-out;
    }
    #email:hover,#password:hover,#num:hover,#name:hover{
        transition: background-color 0.5s ease-in-out;
        background-color: antiquewhite;
    }

    @media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
        width: 100%;
    }
    }
    @keyframes fadein{
        from{
            opacity: 0;
        }
        to{
            opacity: 1;
        }
    }

    form{
        transition: background-color 0.3s ease;
        background-color: white;
        position: relative;
        left: 50%;
        transform: translate(-50%);
        height: 650px;
        max-width: 500px;
        min-width: 250px;
        padding: 20px;
        border-radius: 15px;
        margin-top: 15px;
        animation: fadein 1s;
    }

    </style>
</head>

<body>
    <form action="profile_set.php" method="post">

        <div class="container">
            <h1>회원정보</h1>
            <hr>
                <div clasa = "email">
                <label for="email"><b>이메일</b></label>
                <input id="email" type="text" value="<?=$email?>" name="email" required>
                </div>
                <div class = "id">
                <label for="num"><b>학번</b></label>
                <input id="num" type="text" value="<?=$num?>" name="num" required>
                </div>
                <div class="password">
                <label for="password"><b>비밀번호</b></label>
                <input id="password" type="password" value="<?=$password?>" name="password" required>
                </div>
                <div class="name">
                <label for="name"><b>닉네임</b></label>
                <input id="name" type="text" value="<?=$name?>" name="name" required>
                </div>    
                <div class="clearfix">
                    <button type="submit" class="signupbtn">수정하기</button>
                    <a href="main.php"><button type="button" class="cancelbtn">취소</button></a>
                    <a href="logdel.php"><button type="button" class="profilebtn">회원탈퇴</button></a>
                </div>
        </div>
      </form>
</body>
</html>

