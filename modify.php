<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'users');
if (mysqli_connect_error()) {
    echo 'mysql 접속 중 오류가 발생했습니다.';
    echo mysqli_connect_error();
}
$idx = $_GET['idx'];
$sql = "SELECT * FROM board WHERE idx='$idx'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>게시판 수정</title>
</head>

<body>
    <form action="modifyPost.php" method="POST">
        <input type="hidden" name="idx" value="<?= $idx ?>">
        <table class="table">
            <tr>
                <th> 이름 </th>
                <td> <input type="hidden" name="name" value="<?= $data['name'] ?>"><?= $data['name'] ?> </td>
            </tr>
            <tr>
                <th> 제목 </th>
                <td> <input type="text" name="subject" style="width:100%" value="<?= $data['subject'] ?>"> </td>
            </tr>

            
            <tr>
                <th> 내용 </th>
                <td>
                    <textarea name="memo" style="width: 100%; height:300px"><?= $data['memo'] ?></textarea>
                </td>
            </tr>
            
            <tr>
                <th> 파일 </th>
                <td> <a href="./upload/<?=$data['file']; ?>" download><?=$data['file']; ?></a> </td>
               
            </tr>

            <tr>
                <td colspan="2">
                    <div style="text-align: center;">
                        <input type="submit" value="저장">
                    </div>
                </td>
            </tr>
        </table>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>