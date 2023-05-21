<?php
session_start();
$name = isset($_SESSION['name']) ? $_SESSION['name'] : "";
$conn = mysqli_connect('localhost', 'root', '111111', 'users');
if (mysqli_connect_error()) {
    echo 'mysql 접속 중 오류가 발생했습니다.';
    echo mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>게시판</title>
</head>

<body>
    <h1>'<?php echo $name ?>'님, 안녕하세요</h1>
    <a href="logout.php">Logout</a>
    <a href="write.php">글쓰기</a>

    <table class="table">
        <tr>
            <th width=100> No </th>
            <th> 제목 </th>
            <th width=150> 작성자 </th>
            <th width=200> 작성일자 </th>
        </tr>
        <?php
        $sql = "SELECT * FROM board order by idx desc";
        $result = mysqli_query($conn, $sql);

        while ($data = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td> <?= $data['idx'] ?> </td>
                <td> <a href="view.php?idx=<?= $data['idx'] ?>"><?= $data['subject'] ?></a> </td>
                <td> <?= $data['name'] ?> </td>
                <td> <?= $data['regdate'] ?> </td>
            </tr>
        <?php
        }
        ?>
    </table>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>