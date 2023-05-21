<?php 
    $conn = mysqli_connect('localhost', 'root', '111111', 'users');
    
    if(empty($_POST['name'])){
        echo "<script>alert('아이디가 비어있어요. 다시 시도해주세요.');
        history.back(1);
        </script>";
    } else if(empty($_POST['password'])){
        echo "<script>alert('비밀번호가 비어있어요. 다시 시도해주세요.');
        history.back(1);
        </script>";
    }

    $sql_same = "SELECT * FROM profile where name = '{$_POST['name']}'";
    $result = mysqli_query($conn, $sql_same);
    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('중복되는 이름이 있습니다. 다시 시도해주세요.');
        history.back(1);
        </script>";
    }

    $sql = "
        INSERT INTO profile
        (name, password)
        VALUES(
            '{$_POST['name']}',
            '{$_POST['password']}'
        )
    ";
    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo "<script>alert('계정을 만들지 못했습니다. 다시 시도해주세요.');
        history.back(1);
        </script>";
        error_log(mysqli_error($conn));
    } else {
        echo "<script>alert('계정을 성공적으로 만들었습니다.');
        location.href='index.php';
        </script>";
    }
?>