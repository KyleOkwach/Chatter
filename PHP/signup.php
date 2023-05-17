<?php
    session_start();
    include_once "config.php";

    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $pass = mysqli_real_escape_string($conn,$_POST["password"]);
    $cpass = mysqli_real_escape_string($conn,$_POST["cpassword"]);
    $profile_err = $_FILES['profile']['error'];

    $curr_time = time();
    $pass_crypt = password_hash($pass, PASSWORD_DEFAULT);

    $uniqid = rand(time(), 10000000);
    if(!empty($username) && !empty($email) && !empty($pass) && !empty($cpass)) {
        if($cpass != $pass) {
            echo "The passwords don't match";
            // echo $profile;
        } else {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    
                if(mysqli_num_rows($sql) > 0) {
                    echo "Email $email already exists";
                } else {
                    if($profile_err != 4) {
                        $img = $_FILES['profile'];
                        $img_name = $img['name'];
                        $img_type = $img['type'];
                        $tmp_name = $img['tmp_name'];
    
                        $img_explode = explode(".", $img_name);
                        $img_ext = end($img_explode);
    
                        $valid = ['png', 'jpg', 'jpeg'];
                        if(in_array($img_ext, $valid)) {
                            $new_img_name = $curr_time . $img_name;
    
                            if(move_uploaded_file($tmp_name, "uploads/profiles/".$new_img_name)) {
                                // inserting data to database
                                $sql2 = mysqli_query($conn, "INSERT INTO users(uniqueid, username, email, password, profile, datejoined) VALUES({$uniqid}, '{$username}', '{$email}', '{$pass_crypt}', '{$new_img_name}', CURRENT_DATE())");
                                if($sql2) {
                                    $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($sql3) > 0) {
                                        $row = mysqli_fetch_assoc($sql3);
                                        $_SESSION['unique_id'] = $row['unique_id'];
                                        echo "success";
                                    }else {
                                        echo "Email doesn't exist";
                                    }
                                } else {
                                    echo "Something went wrong";
                                }
                            }
                        } else {
                            echo "Invalid image file";
                        }
                    } else {
                        // inserting data to database
                        $sql4 = mysqli_query($conn, "INSERT INTO users(uniqueid, username, email, password, datejoined) VALUES({$uniqid}, '{$username}', '{$email}', '{$pass_crypt}', CURRENT_DATE())");
                        if($sql4) {
                            $sql5 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if(mysqli_num_rows($sql5) > 0) {
                                $row2 = mysqli_fetch_assoc($sql5);
                                $_SESSION['session_id'] = $row2['uniqueid'];
                                echo "success";
                            }
                        } else {
                            echo "Something went wrong";
                        }
                    }
                }
            } else {
                echo "Invalid email";
            }
        }
    } else {
        echo "Please fill in the required fields";
    }
?>