<?php
    session_start();
    unset($_SESSION['session_id']);
    header("location: ../login.php");

    // Logout 
    session_destroy();
?>