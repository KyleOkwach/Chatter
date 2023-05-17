<?php
    session_start();
    include_once "PHP/config.php";

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE uniqueid = '{$_SESSION['session_id']}'");
    $row = mysqli_fetch_assoc($sql);
?>
<?php include_once "head.php" ?>
    <script src="Javascript/ajax/contacts.js" defer></script>
    <script src="Javascript/state_manager.js" defer></script>
    <script src="Javascript/dom_settings.js" defer></script>
</head>
<div class="flex sidebar padded-default shadow">
    <div class="flex flex-h">
        <div class="flex-h logo logo-main">
            <h1>Chatter</h1>
        </div>
    </div>
    <div class="sidebar__btns hidden flex flex-h">
        <button class="btn btn-category flex flex-center btn-friends ">
            <iconify-icon icon="fa-solid:user-friends"></iconify-icon>
            <!-- Friends -->
        </button>
        <button class="btn btn-category flex flex-center btn-groups">
            <iconify-icon icon="material-symbols:groups"></iconify-icon>
            <!-- Groups -->
        </button>
    </div>
    <div class="searchbar__container padded-default flex flex-center relative">
        <input type="text" class="searchbar" placeholder="Search...">
    </div>

    <hr class="hr-small">

    <div class="contacts flex scroll relative">
        <!-- contacts go here -->
    </div>
    <div class="profile flex flex-h padded-sm relative">
        <div class="settings padded-sm absolute">
            <button class="btn flex flex-h settings-option logout">
                <p class="text">Log out</p>
                <iconify-icon icon="material-symbols:logout"></iconify-icon>
            </button>
        </div>
        <div class="image-container">
            <img class="image-fill" src="PHP/uploads/profiles/<?php echo $row['profile']?>" alt="">
        </div>
        <div class="profile-desc">
            <p><?php echo $row['username']?></p>
            <p class="text-sm"><?php echo $row['email']?></p>
        </div>
        <div class="profile-settings flex">
            <button class="btn flex btn-settings">
                <iconify-icon icon="ph:dots-three-outline-fill"></iconify-icon>
            </button>
        </div>
    </div>
</div>