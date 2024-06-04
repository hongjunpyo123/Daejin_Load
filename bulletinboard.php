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
        $search = $_GET['search'] ?? '';
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

        <!-- bulletinboard.css -->
        <link rel="stylesheet" href="css/bulletinboard.css">
        
        <!--사진 조절 사이트 https://www.adobe.com/kr/express/feature/image/resize-->

        <style>
            .dropdown-item{
                width: 158px;
            }
        </style>
    </head>
    <body>
        <?php
        # PAGING
        $list_size = 8;
        $more_pages = 1;
        $page = $_GET['page'] ?? 1;

        if(empty($search)){
            $sql = "select count(*) from bulletinboard"; //전체 게시글 숫자 받아오기
        }else{
            $sql = "select count(*) from bulletinboard WHERE title LIKE '%$search%' OR content LIKE '%$search%'"; //전체 게시글 숫자 받아오기
        }
        $result2 = $conn->query($sql);
        $row2 = $result2->fetch_row();
        $rowcnt = $row2[0];
        
        $pages = (int)($rowcnt / $list_size); //몇 페이지를 만들지
        if($rowcnt % $list_size > 0){
            $pages ++;
        }

        $start_page = max($page-$more_pages, 1);
        $end_page = min($page + $more_pages, $pages);
        $offset = ($page - 1) * $list_size; //건너뛸 게시물

        if(empty($search)){
            $sql = "SELECT * FROM bulletinboard order by id desc limit $offset, $list_size";
        }else{
            $sql = "SELECT * FROM bulletinboard WHERE title LIKE '%$search%' OR content LIKE '%$search%' ORDER BY id DESC limit $offset, $list_size;";
        }
        $result = $conn->query($sql);
        if($result->num_rows <= 0){
            $search = '';
            echo "<script>alert('검색 결과가 없습니다!');</script>";
            echo "<script>location.href='bulletinboard.php'</script>";
        }

        ?>
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
                    <form class="d-flex" role="search" method="get" action="bulletinboard.php">
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
                                <p style="margin: 0;"><?=$row[1]." ".substr($row[2],0,4)?>****</p>
                                <p style="margin: 0;">등록일 : <?=$row[3]?></p>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <!-- 페이지 버튼 생성 -->
            <div class="page_number_container d-flex justify-content-center">
                <?php
                    if($page > 1){
                        ?>
                            <a href="bulletinboard.php?page=<?=($page-1)?>&search=<?=$search?>" id='page_number'><</a>
                        <?php
                    }
                    for($p = $start_page; $p <= $end_page; $p++){
                        if($p == $page){
                            echo "<a href='#' id='page_number_active'>$p</a>";
                        } else{
                            echo "<a href='bulletinboard.php?page=$p&search=$search' id='page_number'>$p</a>";
                        }
                    }
                    if($page < $end_page){
                        ?>
                            <a href="bulletinboard.php?page=<?=($page+1)?>&search=<?=$search?>" id='page_number'>></a>
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