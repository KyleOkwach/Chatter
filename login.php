<?php include_once "head.php" ?>
    <script src="Javascript/show_pass.js" defer></script>
    <script src="Javascript/ajax/login.js" defer></script>
</head>
<div class="form-container flex flex-center">
    <form class="form-login">
        <div class="form flex flex-center shadow padded-default">
            <div class="flex-h logo">
                <h1>Chatter</h1>
            </div>
            <p class="text-italic">
                Login to continue
            </p>
            <hr>
            <div class="error-message padded-default flex">
                Error message
            </div>
            <div class="input-field flex relative">
                <iconify-icon class="absolute" icon="mdi:user-circle"></iconify-icon>
                <input class="form-input padded-default" type="text" name="username" placeholder="Username or Email">
            </div>
            <div class="input-field flex relative">
                <iconify-icon class="absolute" icon="mdi:password"></iconify-icon>
                <input class="form-input padded-default" type="password" name="password" placeholder="password">
                <button class="btn btn-pass btn-transparent absolute flex flex-center">
                    <iconify-icon class="pass-eye" icon="ic:baseline-remove-red-eye"></iconify-icon>
                </button>
            </div>
            <button class="btn btn-form padded-default">
                <p>Login</p>
            </button>
            <div>
                <p>Don't have an account? <a class="text-italic" href="signup.php">Create one</a></p>
            </div>
        </div>
    </form>
</div>