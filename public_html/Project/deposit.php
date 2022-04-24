<?php
require_once(__DIR__."/../../partials/nav.php");

// if (!is_logged_in()) {
// 	flash("You don't have permission to view this page", "warning");
//     die(header("Location: login.php"));
// }
if(isset($_POST["amount"]) && isset($_POST["account_id"])){
	if($_POST["amount"] < 1){
		flash("Amount is less than 1", "danger");
	}
	else{
		$amount= $_POST["amount"];
		$id= $_POST["account_id"];
		try{
			deposit($id, $amount, $_POST["memo"]);
			flash("Amount deposited successfully, Check the Transaction page","success");
		}
		catch(PDOException $e){
			var_export($e);
		}
	}
}
require(__DIR__ . "/../../partials/flash.php");
?>

<h2>Deposit</h2>
<form method="POST">
	<div>
		<label for="">Select which account would you like to deposit to: </label>
		<select name="account_id" required>
			<option value=""></option>
			<?php $results= getAccounts();?>
			<?php foreach($results as $key => $value):?>
				<option value="<?php se($value["id"]);?>"><?php se($value["account_number"]);?></option>
			<?php endforeach;?>		
		</select>
	</div><br>
	<div>
		<label for="amount"> Amount to Depoist (in dollars): </label>
		<span>$</span>
		<input type="number" id="amount" name="amount" required min="1">
	</div>
	<div>
		<label for="memo">Memo:</label>
		<input type="text" id="memo" name="memo" placeholder="Enter memos....">
	</div>
    <input type="submit">
</form>
