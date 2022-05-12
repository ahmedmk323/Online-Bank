<?php
require_once(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}

$results = getAccounts();
$apy = getApy();
?>

<?php if (!$results): ?>
    <h2>No accounts are found</h2>;
<?php endif; ?>

<div class= "container">
    <h2>My Accounts</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Account Number</th>
                <th>Balance</th>
                <th>Type</th>
                <th>APY</th>
                <th>Modified</th>
            </tr>
        </thead>
        <?php foreach($results as $key => $value):
            $url= get_url("transactions.php");
            $url .= "?account_id=".$value["id"];
        ?>
        <tr>
            <td id='acc'><?php echo $value["account_number"];?></td>
            <td>$<?php 
            if($value["account_type"] === "loan"){
                $balance= trim(strval($value["balance"]),'-');
                echo $balance; 
            }
            else
                echo $value["balance"]; ?></td>
            <td><?php echo $value["account_type"];?></td>
            <td> <?php 
            if ($value["account_type"] === "savings" || $value["account_type"] === "loan"){
                echo ($apy * 100) . "%";
            }
            else{
                echo "-";
            }
            ?></td>
            <td><?php echo $value["modified"];?></td>
            <td><a href="<?php echo $url;?>">View Account</a></td>
        </tr>
        <?php endforeach?>
    </table>
</div>
<div id="Transaction"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>