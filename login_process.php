<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '111111', 'users');
$id = $_POST['name'];
$pw = $_POST['password'];
$sql = "SELECT * FROM profile where name='$id';";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num == 0) {
    echo "<script>alert('아이디가 틀렸어요. 다시 시도해주세요.');
        history.back(1);
        </script>";
} else {
    $array = mysqli_fetch_array($result);
    $password = $array['password'];
    if ($pw != $password) {
        echo "<script>alert('비밀번호가 틀렸어요. 다시 시도해주세요.');
        history.back(1);
        </script>";
    } else {
        $_SESSION['name'] = $array['name'];
        header('Location: list.php');
    }
}

