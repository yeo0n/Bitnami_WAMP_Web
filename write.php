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
    <title>글쓰기</title>
</head>

<body>
    <form action="writePost.php" method="POST" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <th> 이름 </th>
                <td> <input type="hidden" name="name" value="<?php echo $name ?>"><?php echo $name ?> </td>
            </tr>
            <tr>
                <th> 제목 </th>
                <td> <input type="text" name="subject" style="width:100%"> </td>
            </tr>
            <tr>
                <th> 내용 </th>
                <td>
                    <textarea name="memo" style="width: 100%; height:300px"></textarea>
                </td>
            </tr>

            <tr>
                <th> 파일 업로드 </th>
                <td>
                    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                    <input type="file" name="b_file">
                </td>
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