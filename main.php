<?php
        session_start();
        if(!$_SESSION['logged']){
            echo "<script>alert('로그인 정보가 없습니다!')</script>";
            echo "<script>location.href='login.html';</script>";
        }
        $num = $_SESSION['num'];
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAEJINLOAD</title>
      <!-- Favicons -->
  <link href="img/symbol.png" rel="icon">
</head>
<body>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Brush+Script&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--AOS라이브러리-->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"> 
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 
    <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.fullpage.js"></script>
        <link href="js/jquery.fullpage.css" rel="stylesheet">
    <style>
        html{
            height: 100vh;
        }
        body{
            height: 100vh;
        }
        .navbar-brand{
            transition: background-color 0.3s ease-in-out;
            border: 3px solid gray;
            border-radius: 8px;
            font-size: 20px;
            font-family: fantasy;
            padding: 8px;
            background-color: white;
        }
        .navbar-brand:hover{
            transition: background-color 0.3s ease-in-out;
            background-color: cornflowerblue;
        }
        #go{
            border: none;
        }
        #background{
            width: 100%;
            height: 55vh;
            background-image: url("https://t1.daumcdn.net/brunch/service/user/3gu/image/1Xv8dChXdWI0zl9GXkyxwzLBXf0.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            transition: background-image 0.5s ease-in-out;
            animation: fadein 1s;
        }
        #sc{
            display: flex;
            flex-wrap: wrap;
            height: 100%;
            justify-content: space-evenly;
            background-image: url("img/하늘.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            animation: fadein 1s;
        }
        #card{
            transition: left 0.3s ease-in-out;
            position: fixed;
            opacity: 1;
            width: 270px;
            height: 180px;
            left: -240px;
            bottom: 30%;
            float: left;
        }
        #card:hover{
            transition: left 0.5s ease-in-out;
            cursor: pointer;
            left: 0px;
        }
        #low_bar{
            opacity: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            background-color: gray;
            height: 160px;
        }
        #low_bar_text{
            position: relative;
            text-align: left;
            color: white;
        }

        @keyframes fadein{
            from{
                opacity: 0;
            }
            to{
                opacity: 1;
            }
        }
        @media (max-width: 471px){
            #card{
                opacity: 0;
            }
            #low_bar{
                opacity: 0;
            }
            #number{
            display: none;
        }
        }
        .first_card,.second_card,.third_card,.four_card,.five_card{
            text-align: center;
            background-color: white;
            border: 7px solid white;
            border-radius: 5px;
            height: 200px;
            width: 220px;
            min-width: 220px;
            margin: 5px;
        }
        .first_card:hover,.second_card:hover,.third_card:hover,.four_card:hover,.five_card:hover{
            transition: box-shadow 0.3s ease-in-out;
            cursor: pointer;
            box-shadow: 4px 4px 4px gray;
        }
        .first_card{
            background-image: url("img/수강신청.png");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .second_card{
            background-image: url("img/학교생활.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .third_card{
            background-image: url("img/선배.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .four_card{
            background-image: url("img/학교지도.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .five_card{
            background-image: url("img/채팅방.png");
            background-repeat: no-repeat;
            background-size: 100%;
            background-position: center;
        }
        .btn-custom{
            color: blue;
        }
        .btn-custom:hover{
            background-color:cornflowerblue;
        }
        #first_tip,#second_tip,#third_tip,#four_tip,#five_tip{
            font-family: "Nanum Brush Script", cursive;
            font-weight: 1000;
            font-style: normal;
            font-size: 30px;
        }
        #number{
            transition: color 0.5s ease-in-out;
            position: relative;
            border-radius:  5px;
            margin: 0;
            padding: 5px;
            color: gray;
            left: 100%;
        }
        #number:hover{
            transition: color 0.5s ease-in-out;
            color: black;
            cursor: default;
        }
        hr{
            position: relative;
            width: 220px;
            left: 5px;
            border-top: 3px solid black;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Daejin-Load</a>
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="https://www.daejin.ac.kr">대진대학교</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.daejin.ac.kr">학교영상</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  메뉴
                </a>
                <ul class="dropdown-menu">
                <li ><a class="dropdown-item" href="수강신청페이지/ApplicationloginPage.html">수강신청 TIP</a></li>
                  <li><a class="dropdown-item" href="#">학교생활 TIP</a></li>
                  <li><a class="dropdown-item" href="#">선배의 조언</a></li>
                  <li><a class="dropdown-item" href="building.html">학교지도</a></li>
                  <li><a class="dropdown-item" href="noticeboard.php">채팅방</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php">로그아웃</a></li>
                  <li><a class="dropdown-item" href="logdel.php" style="color:red;">회원탈퇴</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <p id="number"><?=$_SESSION['name']?> 님 반가워요!</p>
              </li>
            </ul>
            <form class="d-flex" role="search" method="get" action="search.php">
              <input class="form-control me-2" type="search" placeholder="검색하세요" aria-label="Search" name="search">
              <button class="btn btn-outline-success btn-custom" type="submit" id="go">GO!</button>
            </form>
          </div>
        </div>
      </nav>
      <div id="background">
      </div>
      <div id="sc">
        <div class="first_card_base">
            <tr>
                <td>
                    <p style="margin: 0; padding: 0; margin-top: 20px;"><li id="first_tip"> 수강신청 Tip</li></p>
                    <hr>
                    <a href="수강신청페이지/ApplicationloginPage.html?num=<?=$num?>"><div class="first_card"></div></a>
                </td>
            </tr>
        </div>
        <div class="second_card_base">
            <tr>
                <td>
                    <p style="margin: 0; padding: 0;margin-top: 20px;"><li id="second_tip"> 학교생활 Tip</li></p>
                    <hr>
                    <a href=""><div class="second_card"></div></a>
                </td>
            </tr>
        </div>
        <div class="third_card_base">
            <tr>
                <td>
                    <p style="margin: 0; padding: 0;margin-top: 20px;"><li id="third_tip"> 선배의 조언</li></p>
                    <hr>
                    <a href=""><div class="third_card"></div></a>
                </td>
            </tr>
        </div>
        <div class="four_card_base">
            <tr>
                <td>
                    <p style="margin: 0; padding: 0;margin-top: 20px;"><li id="four_tip"> 학교지도</li></p>
                    <hr>
                    <a href="building.html"><div class="four_card"></div></a>
                </td>
            </tr>
        </div>
        <div class="five_card_base">
            <tr>
                <td>
                    <p style="margin: 0; padding: 0;margin-top: 20px;"><li id="five_tip"> 채팅방</li></p>
                    <hr>
                    <a href="noticeboard.php"><div class="five_card"></div></a>
                </td>
            </tr>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const images = [
            'img/학교사진1.png',
            'img/학교사진2.png',
            'img/학교사진3.png',
            'img/학교사진4.png',
            'img/학교사진5.png',
        ];
        let currentIndex = 0;

        function changeBackgroundImage() {
            currentIndex++;
            if (currentIndex >= images.length) {
                currentIndex = 0;
            }
            document.getElementById('background').style.backgroundImage = `url('${images[currentIndex]}')`;
        }
        setInterval(changeBackgroundImage, 2800);
    </script>
    <div id="card_container">
        <a href="https://card.kbcard.com/CXPRICAC0076.cms?mainCC=a&cooperationcode=04148"><img src="img/학교카드.png" id="card"></a>
    </div>
    <div id="low_bar">
        <li id="low_bar_text">제작 : 0000</li>
        <li id="low_bar_text">전화번호 : 010-0000-0000</li>
        <li id="low_bar_text">제작일 : 2024-00-00</li>
    </div>
<script> 
  AOS.init({
    duration: 1000,
    once: true
  });
</script>
</body>
</html>