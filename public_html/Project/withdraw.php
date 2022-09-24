<?php
require_once(__DIR__."/../../partials/nav.php");

if (!is_logged_in()) {
	flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}
if(isset($_POST["amount"]) && isset($_POST["account_id"])){
    try{
	    $balance= inquiryBalance($_POST["account_id"]);
        $balance= $balance[0]["balance"]; // Balance 
    }
    catch(PDOException $e){
        var_export($e->errorInfo);
    }
    if($_POST["amount"] < 1){
        flash("Amount is less than 1", "danger");
	}
    else if ($balance < $_POST["amount"]){
        flash("Amount to withdrew is more than the remaining balance (Balance: $balance)","danger");
    }
	else{
		$amount= $_POST["amount"];
		$id= $_POST["account_id"];
		try{
			withdraw($id, $amount, $_POST["memo"]);
			flash("Amount withdrew successfully, Check the Transaction page","success");
		}
		catch(PDOException $e){
			var_export($e);
		}
	}
}
require(__DIR__ . "/../../partials/flash.php");
?>
<div class="container">
	<h2>Withdraw</h2>
	<form class="p-3" method="POST">
		<div class="mb-3">
			<label for="account_id" class="form-label">Select which account would you like to Withdraw from: </label>
			<select name="account_id" id="account_id" class="form-select" required>
				<option value=""></option>
				<?php $results= getAccounts();?>
				<?php foreach($results as $key => $value):?>
                    <?php if($value["account_type"] !== "loan"):?>
						<option value="<?php se($value["id"]);?>"><?php se($value["account_number"]);?></option>
					<?php endif;?>
				<?php endforeach;?>		
			</select>
		</div>
		<label for="amount"> Amount to withtdraw (in dollars): </label>
		<div class="mb-3 input-group">
			<span class="input-group-text">$</span>
			<input type="number" class="form-control" id="amount" name="amount" required min="1">
		</div>
		<div class="mb-3">
			<label for="memo" class="form-label">Memo:</label>
			<input type="text" class="form-control" id="memo" name="memo" placeholder="Enter memos....">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>