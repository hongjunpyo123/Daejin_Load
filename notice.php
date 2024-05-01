<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card_container{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .card{
            margin: 20px;
        }
    </style>
    <title>Document</title>
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
                  <li><a class="dropdown-item" href="#">강의실</a></li>
                  <li><a class="dropdown-item" href="#">수강신청</a></li>
                  <li><a class="dropdown-item" href="#">학교지도</a></li>
                  <li><a class="dropdown-item" href="#">학교건물</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="login.html">로그아웃</a></li>
                </ul>
              </li>
              
            </ul>
            <form class="d-flex" role="search" method="get">
              <input class="form-control me-2" type="search" placeholder="검색하세요" aria-label="Search">
              <button class="btn btn-outline-success" type="submit" name="search" id="go">GO!</button>
            </form>
          </div>
        </div>
      </nav>



<div class="card_container">
    <table>
        <?php
        for($i = 0; $i < 10; $i++){?>
        <div class="card" style="width: 18rem;">
        <img src="https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2FMjAyNDA0MDJfMTkw%2FMDAxNzEyMDQwMDc5ODM0.EJvAbmuOnGWwEVViWzXYtfbJ9U1SQmHNvt70_anhF_Yg.dN6kqStzIc6M-569lpej2OnRjZbif_QUPguhKtbaJwUg.PNG%2F%25C4%25B8%25C3%25B31.PNG&type=sc960_832" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>
        <?php
        }
        ?>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>