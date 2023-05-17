<?php
    session_start();
    include_once "config.php";

    $senderid = mysqli_real_escape_string($conn, $_POST['sender']);
    $receipientid = mysqli_real_escape_string($conn, $_POST['receipient']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if(!empty($message)) {
        $sql = mysqli_query($conn, "INSERT INTO messages (message, senderid, receipientid, timesent)
                            VALUES('{$message}', {$senderid}, {$receipientid}, CURRENT_DATE())") or die();
    }
    if(isset($_SESSION['unique_id'])) {
    }else {
        header("../login.php");
    }
?>