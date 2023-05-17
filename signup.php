<?php include_once "head.php" ?>
    <script src="Javascript/file.js" defer></script>
    <script src="Javascript/show_pass.js" defer></script>
    <script src="Javascript/ajax/signup.js" defer></script>
</head>
<div class="form-container flex flex-center">
    <form class="form-signup" enctype="multipart/form-data">
        <div class="form flex flex-center shadow padded-default">
            <div class="flex-h logo">
                <h1>Chatter</h1>
            </div>
            <p class="text-italic">
                Create an account to continue
            </p>
            <hr>
            <div class="error-message padded-default flex">
                Error message
            </div>
            <div class="input-field flex relative">
                <iconify-icon class="absolute" icon="mdi:user-circle"></iconify-icon>
                <input class="form-input padded-default" type="text" name="username" placeholder="Username">
            </div>
            <div class="input-field flex relative">
                <iconify-icon class="absolute" icon="material-symbols:alternate-email"></iconify-icon>
                <input class="form-input padded-default" type="text" name="email" placeholder="Email">
            </div>
            <div class="input-field flex relative">
                <iconify-icon class="absolute" icon="mdi:password"></iconify-icon>
                <input class="form-input padded-default" type="password" name="password" placeholder="password">
                <button class="btn btn-pass btn-transparent absolute flex flex-center">
                    <iconify-icon class="pass-eye" icon="ic:baseline-remove-red-eye"></iconify-icon>
                </button>
            </div>
            <div class="input-field flex relative">
                <iconify-icon class="absolute" icon="mdi:password"></iconify-icon>
                <input class="form-input padded-default" type="password" name="cpassword" placeholder="Confirm password">
            </div>
            <button class="flex btn-file padded-default">
                <div class="container padded-sm flex">
                    <iconify-icon icon="material-symbols:image"></iconify-icon>
                    <h3 class="file-name">Select profile picture</h3>
                </div>
            </button>
            <input class="form-file" type="file" name="profile">
            <button class="btn btn-form padded-default">
                <p>Signup</p>
            </button>
            <div>
                <p>Already have an account? <a class="text-italic" href="login.php">Login</a></p>
            </div>
        </div>
    </form>
</div>