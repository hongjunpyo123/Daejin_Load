<?php
    include_once("conn.php"); 
    session_start();
    $id = $_GET['id'];
    $conn->query("delete from noticeboard where id = '$id'");
    echo "<script>location.href='noticeboard.php'</script>";
?>