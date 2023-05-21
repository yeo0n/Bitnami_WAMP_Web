<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'users');
if (mysqli_connect_error()) {
    echo 'mysql 접속 중 오류가 발생했습니다.';
    echo mysqli_connect_error();
}
ini_set("display_errors", "1");
$name = $_POST['name'];
$subject = $_POST['subject'];
$memo = $_POST['memo'];
$uploads_dir = './upload';
$error = $_FILES['b_file']['error'];
$fname = $_FILES['b_file']['name'];
$ext = array_pop(explode('.', $fname));

if($error != UPLOAD_ERR_OK) {
    switch ($error) {
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "파일이 너무 큽니다. $(error)";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "파일이 첨부되지 않았습니다.$(error)";
            break;
        default:
            echo "파일이 제대로 업로드되지 않았습니다. $(error)";
    }
    exit;
}

move_uploaded_file($_FILES['b_file']['tmp_name'], "$uploads_dir/$fname");

date_default_timezone_set('Asia/Seoul');
$regdate = date("Y-m-d H:i:s");
$sql = "
        INSERT INTO board
        (name, subject, memo, regdate, file)
        VALUES('$name','$subject','$memo','$regdate', '$fname')";
$result = mysqli_query($conn, $sql);
header('Location: list.php');
