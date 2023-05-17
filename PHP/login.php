<?php
    session_start();
    include_once "config.php";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($username) && !empty($pass)) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}' OR email = '{$username}'");
        if(mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            if(password_verify($pass, $row['password'])) {
                $_SESSION['session_id'] = $row['uniqueid'];
                echo "success";
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "Username or email not found";
        }
    } else {
        echo "Please fill all fields";
    }
?>