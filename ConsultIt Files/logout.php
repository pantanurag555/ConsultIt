<?php
session_start();
unset($_SESSION['username']);
session_destroy();
header("Location: LandingPage.php? logout=1");
exit;
?>