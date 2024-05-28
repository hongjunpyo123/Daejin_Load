<?php
        include_once 'conn.php';
        session_start();
        if(!$_SESSION['logged']){
            echo "<script>alert('로그인 정보가 없습니다!')</script>";
            echo "<script>location.href='login.html';</script>";
        }
        header("Refresh: 5");
        $num = $_SESSION['num'] ?? 0;
        $name = $_SESSION['name'] ?? 0;
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>채팅방</title>
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
    <style>
        html{
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background-color: #6fadcf;
        }
        body{
            position: relative;
            margin: 0 auto;
            width: 600px;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0);
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
      .container{
        position: relative;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 5px;
      }
      .btn-custom{
          color: blue;
          border: none;
      }
      .btn-custom:hover{
          background-color:cornflowerblue;
      }
      #wirte_button{
        background-color: rgba(0, 0, 0, 0);
        color: black;
      }
      #wirte_button:hover{
        background-color: blue;
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
        @media (max-width: 500px){
        .container{
            position: relative;
            width: 350px;
            height: 770px;
            background-color: rgba(0, 0, 0, 0);
        }
        body{
            width: 350px;
            height: 770px;
        }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="main.php">Daejin-Load</a>
          
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
                  <li><a class="dropdown-item" href="#">TIP 게시판</a></li>
                  <li><a class="dropdown-item" href="#">선배의 조언</a></li>
                  <li><a class="dropdown-item" href="building.html">학교지도</a></li>
                  <li><a class="dropdown-item" href="../noticeboard.php">채팅방</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="profile.php">회원정보</a></li>
                  <li><a class="dropdown-item" href="logout.php" style="color:red;">로그아웃</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search" method="get" action="search.php">
              <input class="form-control me-2" type="search" placeholder="검색하세요" aria-label="Search" name="search">
              <button class="btn btn-outline-success btn-custom" type="submit" id="go">GO!</button>
            </form>
          </div>
        </div>
      </nav>
      <div class="fixed-bottom d-flex justify-content-center pt-2 pb-2" id="writecontainer">
        <a href="noticeboardwrite.html"><button type="button" class="btn btn-primary" id="wirte_button">글쓰기</button></a>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<?php
    $sql = "SELECT * FROM noticeboard";
    $result = $conn->query($sql);
    ?>
        <div class="container">
        <?php
    while($row = $result->fetch_assoc()){
        ?>
        <div class="card mb-4 mt-5" id="card-container">
            <div class="card-header">
                <?=$row['name']."[".substr($row['num'],2,2)?>학번]
            </div>
            <div class="card-body">
                <p class="card-text"><?=$row['content']?></p>
                <?php
                    if(strcmp($name,"관리자") == 0)
                    {
                        ?>
                        <a href="delete.php?id=<?=$row['id']?>" style="text-decoration: none; color: red;float: right;">삭제</a>
                        <?php
                    }
                    elseif(strcmp($name,$row['name']) == 0){
                        ?>
                        <a href="delete.php?id=<?=$row['id']?>" style="text-decoration: none; color: red; float: right;">삭제</a>
                        <?php
                    }
                ?>
            </div>
        </div>
        <?php
    }
    ?>
        </div>
    <?php
?>


<script> 
  AOS.init({
    duration: 1000,
    once: true
  });
</script>
</body>
</html>