<?php
require_once(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    die(header("Location: login.php"));
}
?>
<link rel="stylesheet" href="<?php echo get_url('styles.css'); ?>">

<nav>
    <ul>
        <li><a href="#">Create Account</a></li>
        <li><a href="#">My Accounts</a></li>
        <li><a href="#">Deposit</a></li>
        <li><a href="#">Withdraw</a></li>
        <li><a href="#">Transfer</a></li>
        <li><a href="<?php echo get_url("profile.php")?>">Profile</a></li>
    </ul>
</nav>

<!-- <script>
    const nav= document.getElementsByTagName("nav")[0];
    nav.remove();
</script> -->