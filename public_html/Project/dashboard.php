<?php
require_once(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    die(header("Location: login.php"));
}
?>
<link rel="stylesheet" href="<?php echo get_url('styles.css'); ?>">

<nav>
    <ul>
        <li><a href="<?php echo get_url('create_account.php');?>">Create Account</a></li>
        <li><a href="<?php echo get_url("accounts.php")?>">My Accounts</a></li>
        <li><a href="<?php echo get_url('deposit.php');?>">Deposit</a></li>
        <li><a href="<?php echo get_url('withdraw.php');?>">Withdraw</a></li>
        <li><a href="<?php echo get_url('transfers.php');?>">Transfer</a></li>
        <li><a href="<?php echo get_url("loan.php")?>">Take Loan</a></li>
        <li><a href="<?php echo get_url("profile.php")?>">Profile</a></li>
    </ul>
</nav>

<!-- <script>
    const nav= document.getElementsByTagName("nav")[0];
    nav.remove();
</script> -->
