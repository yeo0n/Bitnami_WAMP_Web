<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'users');
if (mysqli_connect_error()) {
    echo 'mysql 접속 중 오류가 발생했습니다.';
    echo mysqli_connect_error();
}

    $idx=$_GET['idx'];
    
    $sql = "DELETE FROM board where idx='$idx'";
    $result = mysqli_query($conn, $sql);
    header('Location: list.php');
?>