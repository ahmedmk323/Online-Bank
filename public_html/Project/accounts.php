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
echo"
<div class=\"container\">

    <center>
        <h2>My Accounts</h2>
            <table class=\"table table-striped\">
                <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>Balance</th>
                        <th>Type</th>
                        <th>Modified</th>
                        <th></th>
                    </tr>
                </thead>";
                foreach($results as $key => $value){
                    $url= get_url("transactions.php");
                    $url .= "?account_id=".$value["id"];
                    echo "<tr>
                        <td id='acc'>$value[account_number]</td>
                        <td>$$value[balance]</td>
                        <td>$value[account_type]</td>
                        <td>$value[modified]</td>
                        <td><a href=\"$url\">View Account</a></td>
                    </tr>";
                }
echo "</table> </center> </div>";

?>
<div id="Transaction"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
