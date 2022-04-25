<?php
require_once(__DIR__."/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}

$results= getAccounts();
if(!$results){
    echo "<center><h2>No accounts are found</h2></center>";
    die;
}
echo "<h2>My Accounts</h2>";
echo"
<table>
<thead>
    <tr>
        <th>Account Number</th>
        <th>Balance</th>
        <th>Type</th>
        <th>Modified</th>
    </tr>
</thead>";
foreach($results as $key => $value){
    echo 
    "<tr>
        <td id='acc'>$value[account_number]</td>
        <td>$$value[balance]</td>
        <td>$value[account_type]</td>
        <td>$value[modified]</td>
    </tr>";
}
echo "</table>";
echo "<button onclick=\"transactions()\">View Transactions History</button>";

?>
<div id="Transaction"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function transactions(){
    window.location.href= "transactions.php";
    }
</script>