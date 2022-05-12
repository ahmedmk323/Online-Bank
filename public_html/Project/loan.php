<?php 
require_once(__DIR__."/../../partials/nav.php");
require_once(__DIR__."/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}
$apy= getApy();
if (isset($_POST["submit"]) && isset($_POST["agree"])){
    // echo "<pre>".var_export($_POST,true)."</pre>";
    if (isset($_POST["amount"]) && isset($_POST["account_id"])){
        $type= "loan";
        $amount = $_POST["amount"]; //Positive amount to be turned to negative
        $loanee_id= $_POST["account_id"];
        if ($amount < 500) flash("Minimum amount is less than 500", "danger");
        else{
            // Insert account
            $db= getDB();
            $query= "INSERT INTO Accounts (account_number,user_id,account_type, balance) VALUES 
            (:an,:user_id,:account_type, :balance)";
            $id=get_user_id();
            //$balance= -($amount * ($apy+1)); // negative balance
            $balance= -($amount); // negative balance
            try{
                $stmt=$db->prepare($query);                
                $stmt->execute(
                    [":an" => null,
                    ":user_id" => $id,
                    ":account_type" => $type,
                    ":balance" => $balance]
                );
                $last_id= $db->lastInsertId();
                $str='0123456789abcdefghijklmnopqrstuvwxyz';
                $lpad=substr(str_shuffle($str),0,12);
                $an= str_pad($last_id,12,$lpad,STR_PAD_LEFT);
                
                $query= "UPDATE Accounts SET account_number = :an WHERE id = :id";
                $stmt=$db->prepare($query);
                $stmt->execute([":an" => $an , ":id" =>$last_id]);
                transfer($last_id, $_POST["account_id"],$amount,"deposit");
                                
                flash("You received the loan", "success");
                die(header("Location: accounts.php"));
            }
            catch(PDOException $e){
                var_export($e,false);
                flash("Error Failed to create the account", "danger");
            }
        }
    }
}
?>
<div class="container col-5">
    <h2>Loan Request</h2>
    <form class="p-3" method="POST" onsubmit="return submit_confirm()">
        <input type="hidden" name="type" value="loan">
        <div class="mb-3">
			<label for="account_id" class="form-label">Select which account will receive the loan: </label>
			<select name="account_id" id="account_id" multiple size="5" class="form-select" required>
				<?php $results= getAccounts();?>
				<?php foreach($results as $key => $value):?>
                    <?php if($value["account_type"] !== "loan"):?>
					    <option value="<?php se($value["id"]);?>"><?php se($value["account_number"]);?></option>
                    <?php endif;?>
				<?php endforeach;?>		
			</select>
		</div>
        <p>The minimum amount to take out a loan is $500.00</p>
        <div class="mb-1">
            <label for="amount">Enter amount in dollars:</label>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="amount">$</span>
            <input type="number" class="form-control" id="amount" name="amount" required min="500"><br>
        </div>
        <label for ="" class="form-label mt-2"><span id="asterik">***</span> DISCLAIMR: An interest rate of <span id="apy"><?php echo ($apy * 100);?>%</span> will be applied to loan's balance.</label>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="agree" name= "agree" required>
            <label for="agree" class="form-label">Yes, I agree on the interest rate that will be applied after receiving loan.</label>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary row justify-content-center" name="submit">      
        </div>
    </form>
</div>
<script>
    function submit_confirm(){
        return window.confirm("By clicking submit, the loan will be processed to your account.\n\nIf you wish to continue click OK, otherwise click Cancel");
    }
</script>
<style>
    span#apy{
        color: red;
        text-decoration: underline;
    }
    #asterik{
        color: red;
    }
</style>