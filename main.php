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
    
    <!-- main.css -->
    <link rel="stylesheet" href="css/main.css">
    
    <!-- main.js -->
    <script src="js/main.js" before></script>

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
                <li ><a class="dropdown-item" href="수강신청페이지/ApplicationloginPage.html">수강신청 테스트</a></li>
                  <li><a class="dropdown-item" href="bulletinboard.php">TIP 게시판</a></li>
                  <li><a class="dropdown-item" href="building.html">학교지도</a></li>
                  <li><a class="dropdown-item" href="noticeboard.php">채팅방</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="profile.php">회원정보</a></li>
                  <li><a class="dropdown-item" href="logout.php" style="color:red;">로그아웃</a></li>
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
                    <p style="margin: 0; padding: 0; margin-top: 20px;"><li id="first_tip"> 수강신청 테스트</li></p>
                    <hr>
                    <a href="수강신청페이지/ApplicationloginPage.html?num=<?=$num?>"><div class="first_card"></div></a>
                </td>
            </tr>
        </div>
        <div class="second_card_base">
            <tr>
                <td>
                    <p style="margin: 0; padding: 0;margin-top: 20px;"><li id="second_tip"> Tip 게시판</li></p>
                    <hr>
                    <a href="bulletinboard.php"><div class="second_card"></div></a>
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

</body>
</html>