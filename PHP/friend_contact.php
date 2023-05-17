<?php
    session_start();
    include_once "config.php";

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT uniqueid = '{$_SESSION['session_id']}'");
    
    if(isset($_POST['user'])) {
        $url = $_POST['user'];
    } else {
        $url = "none";
    }
    
    if(mysqli_num_rows($sql) > 0) {
        while($row = mysqli_fetch_assoc($sql)) {
            if($row['uniqueid'] == $url) {
                $class = 'contact-active';
                $class_msg = 'recent-active';
            }else {
                $class = '';
                $class_msg = '';
            }

            $sql2 = mysqli_query($conn, 
                "SELECT * FROM messages 
                WHERE senderid = {$_SESSION['session_id']} AND receipientid = {$row['uniqueid']}
                OR senderid = {$row['uniqueid']} AND receipientid = {$_SESSION['session_id']}
                ORDER BY msgid DESC LIMIT 1");
            $row2 = mysqli_fetch_assoc($sql2);
            if(mysqli_num_rows($sql2) > 0) {
                $recent = $row2['message'];
            } else {
                $recent = "No recent messages";
            }

            $sql3 = mysqli_query($conn,
                    "SELECT COUNT(*) AS unread FROM messages
                    WHERE senderid = {$row['uniqueid']} AND receipientid = {$_SESSION['session_id']}
                    AND msgstatus = 'unread'");
            $row3 = mysqli_fetch_assoc($sql3);

            ($row3['unread'] > 0) ? $read = "" : $read = "hidden";

            (strlen($recent) > 20) ? $msg = substr($recent, 0, 20). "..." : $msg = $recent;
            ($row2['senderid'] == $_SESSION['session_id']) ? $you = "You: " : $you = "";
            echo '
                <button class="contact-link btn-contact"
                onclick="changeState('.$row['uniqueid'].');setState('.$row['uniqueid'].')">
                    <div class="contact padded-sm flex flex-h '.$class.'">
                        <div class="image-container relative">
                            <img class="image-fill" src="PHP/uploads/profiles/'.$row['profile'].'" alt="">
                            <div class="'. $read .' notifications absolute flex flex-center">
                                <p class="text-sm">'. $row3['unread'] .'</p>
                            </div>
                        </div>
                        <div class="contact-description flex relative">
                            <p class="name flex">'.$row['username'].'</p>
                            <div class="message-recent relative">
                                <p class="name text-sm '.$class_msg.'">'. $you .' '. $msg .'</p>
                                <div class="description description-long fixed">
                                    <p class="name text-sm">'. $recent .'</p>
                                </div>
                            </div>
                        </div>
                        <div class="contact-status">
                            <p class="text-sm text-italic">'.$row['status'].'</p>
                        </div>
                    </div>
                </button>
            ';
        }
    } else {
        echo '<div class="null flex"><p class="text-italic">No contacts found</p></div>';
    }
?>