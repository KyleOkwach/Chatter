<?php
    session_start();
    include_once "config.php";

    $senderid = mysqli_real_escape_string($conn, $_POST['user']);
    $receipientid = mysqli_real_escape_string($conn, $_SESSION['session_id']);

    if(!empty($senderid)) {
        $sql = "SELECT * FROM messages
                LEFT JOIN users ON users.uniqueid = messages.senderid
                WHERE (receipientid = '{$receipientid}' AND senderid = '{$senderid}')
                OR (receipientid = '{$senderid}' AND senderid = '{$receipientid}') ORDER BY msgid ASC";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc(($query))) {
                if($row['senderid'] === $senderid) {
                    // if it's the receipient
                    
                    echo '
                    <div class="message__container message__incoming flex flex-h">
                        <div class="message__profile">
                            <img class="image-fill" src="PHP/uploads/profiles/'. $row['profile'] .'" alt="">
                        </div>
                        <div class="message padded-default">
                            <p class="message-text">
                                '. $row['message'] .'
                            </p>
                        </div>
                    </div>
                    ';
                }elseif($row['receipientid'] === $senderid) {
                    // if it's the sender
                    
                    if($row['msgstatus'] == 'read') {
                        $icon = "fluent:mail-all-read-16-regular";
                    }else if($row['msgstatus'] == 'unread') {
                        $icon = "tabler:mail";
                    }
                    echo '
                    <div class="message__container message__outgoing flex flex-h relative">
                        <div class="message padded-default">
                            <p class="message-text">
                                '. $row['message'] .'
                            </p>
                        </div>
                        <div class="message-status absolute flex">
                            <iconify-icon icon='. $icon .'></iconify-icon>
                        </div>
                        <div class="message__profile">
                            <img class="image-fill" src="PHP/uploads/profiles/'. $row['profile'] .'" alt="">
                        </div>
                    </div>
                    ';
                }
            }
        } else {
            echo '
            <div class="timestamp flex flex-h">
                <p class="message-text">
                    No messages
                </p>
            </div>
            ';
        }
    }
?>