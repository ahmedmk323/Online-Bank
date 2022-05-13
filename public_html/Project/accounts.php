<?php
require_once(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}

$user_id= se($_GET,"id",get_user_id(),false);
$isMe= $user_id == get_user_id();
$isDelete= isset($_GET["delete"]);

if($isDelete && $isMe){
    if(isset($_GET["account_id"])){
        $id=$_GET["account_id"];
        $account= getAccounts($id);
        $acc_balance= $account[0]["balance"];
        if($account[0]["account_type"] === "loan" && (($acc_balance * -1) > 0)){
            flash("Loan must be paid off in full first");
        }
        elseif ($account[0]["account_type"] !== "loan" && ($acc_balance > 0)){
            flash("Can not delete Account with remaining balance");
        }
        else{
            $db= getDB();
            $query= "UPDATE Accounts set isActive = :val WHERE id = :id";
            $stmt= $db->prepare($query);
            try{
                $stmt->bindValue(":val", 0, PDO::PARAM_INT);
                $stmt->bindValue(":id", $id, PDO::PARAM_INT);
                $stmt->execute();
                flash("Account is deleted succefully", "success");
                die(header("Location: accounts.php"));
            }
            catch(PDOException $e){
                flash("Error","danger");
            }
        }
    }
    else{
        $delete_bt= true;
    }
}

$results = getAccounts();
$apy = getApy();
?>
<a href="<?php echo get_url("accounts.php")?>?delete=on">Delete Account</a>

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
            <?php if(isset($delete_bt)):?>
                <td><a href="<?php echo get_url("accounts.php")?>?delete=on&account_id=<?php se($value,"id");?>" onclick="return submit_confirm()">Delete</a></td>
            <?php endif ;?>
        </tr>
        <?php endforeach?>
    </table>
</div>
<div id="Transaction"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function submit_confirm(){
        return window.confirm("By clicking Delete, you will delete the account.\n\nIf you wish to continue click OK, otherwise click Cancel");
    }
</script>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>