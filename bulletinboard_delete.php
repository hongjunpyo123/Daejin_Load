<?php
    include_once("conn.php"); 
    session_start();
    $id = $_GET['id'];
    $conn->query("delete from bulletinboard where id = '$id'");
    echo "<script>location.href='bulletinboard.php'</script>";
?>