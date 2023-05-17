<?php
    session_start();
    require "PHP/config.php";
    $uid = $_GET['user'];

    $sql = mysqli_query($conn, "SELECT * FROM users where uniqueid = '{$uid}'");
    $row = mysqli_fetch_assoc($sql);
    ?>
<?php include_once "head.php" ?>
    <script src="Javascript/ajax/chat.js"  defer></script>
</head>
<div class="null flex">
    <h3 class="text-italic">Select contact to start chat</h3>
</div>
<div class="chat flex">
    <div class="chat__details flex flex-h shadow padded-default">
        <div class="chat__details-profile">
            <img class="image-fill" src="PHP/uploads/profiles/<?php echo $row['profile']?>" alt="">
        </div>
        <div class="flex flex-v">
            <div class="chat__details-name">
                <p class="text-m"><?php echo $row['username']; // print_r($_POST)?></p>
            </div>
            <div class="chat__details-status">
                <p class="text-sm"><?php echo $row['status']?></p>
            </div>
        </div>
        <div class="chat__details-btns hidden">
            <button class="btn btn-options flex flex-center">
                <iconify-icon icon="carbon:overflow-menu-vertical"></iconify-icon>
            </button>
        </div>
    </div>
    
    <div class="messages flex scroll">

        <!-- <div class="message__container message__incoming flex flex-h">
            <div class="message__profile">
                <img class="image-fill" src="Files/images/profiles/pfp.jpeg" alt="">
            </div>
            <div class="message padded-default">
                <p class="message-text">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam dolorum odio nulla qui.
                </p>
            </div>
        </div>

        <div class="message__container message__outgoing flex flex-h">
            <div class="message padded-default">
                <p class="message-text">
                    Lorem ipsum dolor sit amet.
                </p>
            </div>
            <div class="message__profile">
                <img class="image-fill" src="Files/images/profiles/pfp2.jpg" alt="">
            </div>
        </div> -->
    </div>
    
    
    <div class="chat__area flex shadow padded-default">
        <form class="form-message flex flex-h">
            <input hidden name="receipient" class="contact-id" type="text" value="<?php echo $_GET['user']?>">
            <input hidden name="sender" type="text" value="<?php echo $_SESSION['session_id']?>">
            <div class="chat__area-text flex-grow">
                <input class="input-field chat__area-text flex-grow padded-sm" type="text" placeholder="Type message..." name="message" autocomplete="off">
            </div>
            <div class="chat__area__buttons flex flex-h">
                <button class="chat__area__buttons-send padded-sm flex flex-center">
                    <iconify-icon icon="ion:paper-plane"></iconify-icon>
                </button>
            </div>
        </form>
    </div>
</div>