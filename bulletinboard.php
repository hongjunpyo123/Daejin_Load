<?php
        session_start();
        include_once 'conn.php';
        if(!$_SESSION['logged']){
            echo "<script>alert('로그인 정보가 없습니다!')</script>";
            echo "<script>location.href='login.html';</script>";
        }
        $num = $_SESSION['num'];
        $name = $_SESSION['name'];
        $today = date("Y/m/d");
        $search = $_POST['search'] ?? '';

        if(empty($search)){
            $sql = "SELECT * FROM bulletinboard order by id desc";
        }else{
            $sql = "SELECT * FROM bulletinboard WHERE title LIKE '%$search%' OR content LIKE '%$search%' ORDER BY id DESC;";
        }
        $result = $conn->query($sql);
?>

<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <head>
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
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
                box-sizing: content-box;
            }

            body {
                background-color: rgba(107, 208, 255, 0.6);;
                height: 100vh;
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

            .card_container{
                position: relative;
                width: 70%;
                left: 50%;
                transform: translate(-50%);
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly;
                animation: fadein 1s;
                margin-top: 2px;

                background-image: url("img/산.jpg");
                background-repeat: repeat;
                background-size: cover;
                background-position: bottom center;
                background-attachment: fixed;

                border: 3px solid black;
                border-radius: 8px;
                
            }
            
            .card{
                transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                margin-top: 10px;
                width: 200px;
            }

            .card:hover{
                transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                box-shadow: 2px 2px 2px gray;
            }

            .write{
                display: flex;
                position: fixed;
                width: 100%;
                top: 93%;
                justify-content: end;
            }
            .write button{
                font-family: fantasy;
                transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out, border 0.3s ease-in-out;
                left: 100%;
                border-radius: 10px;
                font-size: 15px;
                padding: 5px;
                background-color: rgba(75, 137, 0, 0.5);
                color: black;
                border: none;
            }

            .write button:hover{
                transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out, border 0.3s ease-in-out;
                background-color: rgba(75, 137, 220, 1);
                color: white;
            }

            .page_number a{
                text-decoration: none;
                display: none;
            }

            .card-title{
                text-align: center;
            }

            #delete{
                transition: text-shadow 0.2s ease-in-out;
                float: right;
                text-decoration: none;
                color: red;
            }
            #delete:hover{
                transition: text-shadow 0.2s ease-in-out;
                text-shadow: 2px 2px 4px #000000;
            }

            .tip{
                background-color: rgba(0, 0, 0, 0.6);
                color: white;
            }

            @media (max-width: 875px) {
            .card {
                width: 100px;
                font-size: 12px;
            }
            .card-title{
                font-size: 16px;
            }

            .write{
                width: 99%;
                justify-content: center;

            }

            .card_container{
                width: 100%;
                border: none;
                margin: 0;
                border-radius: 0px;
            }

            }

            @media (max-height:723px) {

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
                                    <a class="dropdown-item" href="bulletinboard.php">TIP 게시판</a>
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
                    <form class="d-flex" role="search" method="post" action="bulletinboard.php">
                        <input
                            class="form-control me-2"
                            type="search"
                            placeholder="검색하세요"
                            <?php
                                if(!empty($search)){
                                    ?>
                                    value="<?=$search?>";
                                    <?php
                                }
                            ?>
                            aria-label="Search"
                            name="search">
                        <button class="btn btn-outline-success btn-custom" type="submit" id="go">GO!</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="background">

            <div class="card_container" onclick="">
                <h1 style="width: 100%; text-align: center;" class="tip">TIP게시판!</h1>
                <?php
                    if($result->num_rows <= 0){
                        $search = '';
                        echo "<script>alert('검색 결과가 없습니다!');</script>";
                        echo "<script>location.href='bulletinboard.php'</script>";
                    }
                    while($row = $result->fetch_row()){
                        
                        ?>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                            <div class="delete_btn">
                            <?php
                                if(strcmp($name,"관리자") == 0)
                                {
                                    ?>
                                    <a href="bulletinboard_delete.php?id=<?=$row[0]?>" id="delete">❌</a>
                                    <?php
                                }
                                elseif(strcmp($name,$row[1]) == 0){
                                    ?>
                                    <a href="bulletinboard_delete.php?id=<?=$row[0]?>" id="delete">❌</a>
                                    <?php
                                }
                            ?>
                            </div>
                                <?php if(empty($row[5])){
                                    $row[5] = '제목없음';
                                } ?>
                                <h5 class="card-title"><?=$row[5]?></h5>
                                <hr>
                                <p class="card-text"><?=$row[4]?></p>
                            </div>
                            <hr>
                            <div class="info d-flex flex-column justify-content-center align-items-center">
                                <p style="margin: 0;"><?=substr($row[2],2,2)?> 학번</p>
                                <p style="margin: 0;">등록일 : <?=$row[3]?></p>
                            </div>
                        </div>
                        <?php
                    }
                ?>

            </div>

            <div class="write">
                <a href="bulletinboardwrite.html"><button>TIP작성하기</button></a>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script> 
        AOS.init({
            duration: 500,
            once: false
        });
        </script>         
    </body>
</html>