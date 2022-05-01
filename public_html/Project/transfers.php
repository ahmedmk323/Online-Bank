<?php
require_once(__DIR__."/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}
if(isset($_POST["src"]) && isset($_POST["dest"]) && isset($_POST["amount"])){
    try{
	    $balance= inquiryBalance($_POST["src"]);
        $balance= $balance[0]["balance"]; // Balance 
    }
    catch(PDOException $e){
        var_export($e->errorInfo);
    }

    if($_POST["src"] === $_POST["dest"]){
        flash("Can not transfer to the same account", 'warning');
    }
    elseif($_POST["amount"] < 1 || $_POST["amount"] > $balance){
        flash("Error transfering the requested amount", 'warning');
    }
    else{
		try{
			transfer($_POST["src"],$_POST["dest"], $_POST["amount"], $_POST["memo"]);
			flash("Amount transfered successfully, Check the Transaction page","success");
		}
		catch(PDOException $e){
			var_export($e);
		}
    }
}
?>

<?php 
$user_id= get_user_id();
$src_accounts= getAccounts();
?>

<div class="container">
    <h2 class="pb-2">Transfer</h2>
    <form style="width:80%" class="row g-2 p-3" method="POST" onsubmit="return validate_transfer(this)">
        <div class="col-md-6">
            <label for="src" class="form-label" min="1">Source</label>
            <select class="form-select form-select-sm" name="src" id="src" onchange="show_balance(this)" required> 
                <option value=""></option>
                <?php foreach($src_accounts as $key => $account):?>
                    <option value="<?php se($account["id"]);?>"><?php se($account["account_number"]);?></option>
                <?php endforeach;?>
            </select>
            <input type="hidden" for>
            <?php foreach($src_accounts as $key => $account):?>
                    <p hidden id="<?php se($account["id"]);?>">(Current Balance: $<?php se($account["balance"]);?>)</p>
            <?php endforeach;?>

        </div>
        <div class="col">
            <label for="dest" class="form-label">Destination</label>
            <select class="form-select form-select-sm" name="dest" id="dest" required>
                <option value=""></option>
                <?php foreach($src_accounts as $key => $account):?>
                    <option value="<?php se($account["id"]);?>"><?php se($account["account_number"]);?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-12">
            <label for="amount" class="form-label"> Amount to Transfer:</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" id="amount" name="amount" class="form-control" min="1" required>
            </div>
        </div>
        <div class="col-12">
            <label for="memo" class="form-label">Memo</label>
            <textarea class="form-control" name="memo" id="memo" rows="2" placeholder="Memo..."></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script>
    function show_balance(select){
        const aid= select.value;
        const balancesWithId= document.getElementsByTagName("p");
        for(let balanceEle of balancesWithId){
            if(balanceEle.id == aid) balanceEle.hidden= false;
            else balanceEle.hidden=true;
        }
    }
    function validate_transfer(form){
        let isValid= true;
        const src= form.src.value;
        const dest= form.dest.value;
        const amount= form.amount.value;
        var balance= document.getElementsByTagName("p").namedItem(src);
        balance= balance.textContent.split('$')[1];
        balance= balance.slice(0,balance.length-1);
        
        //Check if source account is same as destination account 
        if (src == dest){
            flash("Can not transfer to the same account", 'warning');
            isValid=false;
        }
        //Check if source account is transfering more money than the remaining in the balance
        if(Number(amount) > Number(balance)){
            flash("The amount to be transfered exceeds the current remaining balance", 'warning');
            isValid=false;
        }
        return isValid;
    }
</script>

<style>
    body{
        background-color: aquamarine;
    }
</style>

<?php require_once(__DIR__."/../../partials/flash.php");?>