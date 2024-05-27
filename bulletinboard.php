<?php
        session_start();
        include_once 'conn.php';
        if(!$_SESSION['logged']){
            echo "<script>alert('로그인 정보가 없습니다!')</script>";
            echo "<script>location.href='login.html';</script>";
        }
        $num = $_SESSION['num'];
        $name = $_SESSION['name'];
?>

<html>
    <meta charset="utf-8">
    <title>게시판</title>
    <head>
        <!-- Favicons -->
        <link href="img/symbol.png" rel="icon">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Nanum+Brush+Script&display=swap"
            rel="stylesheet">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous">
        <!--AOS라이브러리-->
        <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.fullpage.js"></script>
        <link href="js/jquery.fullpage.css" rel="stylesheet">
        <!--fullpage-->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.fullpage.js"></script>
        <link href="js/jquery.fullpage.css" rel="stylesheet">
        <!--google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Dokdo&family=East+Sea+Dokdo&family=Gasoek+One&family=Jua&display=swap"
            rel="stylesheet">
        <!--사진 조절 사이트 https://www.adobe.com/kr/express/feature/image/resize-->
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            body {
                height: 100vh;
            }
            .background {
                height: 100%;
                background-image: url("img/산.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                background-position: bottom left;
                animation: fadein 1s;
            }
            .navbar-brand {
                transition: background-color 0.3s ease-in-out;
                border: 3px solid gray;
                border-radius: 8px;
                font-size: 20px;
                font-family: fantasy;
                padding: 8px;
                background-color: white;
            }

            .btn-custom {
                color: blue;
                border: none;
            }
            .btn-custom:hover {
                background-color: cornflowerblue;
            }

            .navbar-brand:hover {
                transition: background-color 0.3s ease-in-out;
                background-color: cornflowerblue;
            }

            @keyframes fadein {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
            @keyframes fadeout {
                from {
                    opacity: 1;
                }
                to {
                    opacity: 0;
                }
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="main.php">Daejin-Load</a>

                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
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
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                메뉴
                            </a>
                            <ul class="dropdown-menu">
                                <li >
                                    <a class="dropdown-item" href="수강신청페이지/ApplicationloginPage.html">수강신청 테스트</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="bulletinboard.php">학교생활 TIP</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="building.html">학교지도</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="noticeboard.php">채팅방</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="profile.php">회원정보</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="logout.php" style="color:red;">로그아웃</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" method="get" action="search.php">
                        <input
                            class="form-control me-2"
                            type="search"
                            placeholder="검색하세요"
                            aria-label="Search"
                            name="search">
                        <button class="btn btn-outline-success btn-custom" type="submit" id="go">GO!</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="background"></div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </body>
</html>