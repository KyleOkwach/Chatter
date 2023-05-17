<?php
    session_start();

    if(!isset($_SESSION['session_id'])) {
        header("location: login.php");
    }
?>
<?php include_once "head.php" ?>
<body>
    <div class="flex flex-h main">
        <?php include_once "sidebar.php" ?>

        <div class="display">
            <?php include_once "chat.php" ?>
        </div>
    </div>
</body>
</html>