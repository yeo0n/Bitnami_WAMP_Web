<?php
session_start();
$name = isset($_SESSION['name']) ? $_SESSION['name'] : "";
$conn = mysqli_connect('localhost', 'root', '111111', 'users');
if (mysqli_connect_error()) {
    echo 'mysql 접속 중 오류가 발생했습니다.';
    echo mysqli_connect_error();
}
$idx = $_GET['idx'];
$sql = "SELECT * FROM board where idx='$idx'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
$uploads_dir = './upload';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>게시판 View</title>
</head>

<body>
    <form action="writePost.php" method="POST">
        <table class="table">
            <tr>
                <th> 이름 </th>
                <td> <?= $data['name'] ?> </td>
            </tr>
            <tr>
                <th> 제목 </th>
                <td> <?= $data['subject'] ?> </td>
            </tr>

            <tr>
                <th> 파일 </th>
                <td> <a href="./upload/<?=$data['file']; ?>" download><?=$data['file']; ?></a> </td>
            </tr>

            <tr>
                <th> 내용 </th>
                <td>
                    <?= nl2br($data['memo']) ?>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <div style="float:right;">
                        <a class="del" href="del.php?idx=<?= $idx ?>" onclick="return confirm('정말 삭제할까요?')" style="display: none;">삭제</a>
                        <a class="modify" href="modify.php?idx=<?= $idx ?>" style="display: none;">수정</a>
                    </div>
                    <a href="list.php">목록</a>
                </td>
            </tr>
        </table>
    </form>
    <script>
        if('<?=$name?>' == 'admin') {
            document.getElementsByClassName('del')[0].setAttribute("style", "display: block;");
            document.getElementsByClassName('modify')[0].setAttribute("style", "display: block;");
        } else if('<?=$name?>' == '<?=$data['name']?>') {
            document.getElementsByClassName('del')[0].setAttribute("style", "display: block;");
            document.getElementsByClassName('modify')[0].setAttribute("style", "display: block;");
        }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>