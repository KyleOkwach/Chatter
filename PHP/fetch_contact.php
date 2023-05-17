<?php
    session_start();
    include_once "config.php";

    $sql = mysqli_query($conn, "SELECT * FROM users where uniqueid = '{$_POST['user']}'");
    $row = mysqli_fetch_assoc($sql);

    if(isset($_POST['user'])) {
        echo '
                <div class="chat__details-profile">
                    <img class="image-fill" src="PHP/uploads/profiles/'. $row['profile'] .'" alt="">
                </div>
                <div class="flex flex-v">
                    <div class="chat__details-name">
                        <p class="text-m">'. $row['username'] .'</p>
                    </div>
                    <div class="chat__details-status">
                        <p class="text-sm">'. $row['status'] .'</p>
                    </div>
                </div>
                <div class="chat__details-btns hidden">
                    <button class="btn btn-options flex flex-center">
                        <iconify-icon icon="carbon:overflow-menu-vertical"></iconify-icon>
                    </button>
                </div>
            ';
    }

    ?>