<?php
require_once(__DIR__."/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}

function createAcc($type=""){
    if(isset($_POST["type"]) && isset($_POST["deposit_default"])){
        $type= $_POST["type"];
        if ($_POST["deposit_default"] == "yes"){
            $balance= 5;
        }
        else{
            $balance= $_POST["amount"];
        }
    }
    else{
        return flash("Missing one or more Entries", "danger");
    }
    // Insert account
    $db= getDB();
    $query= "INSERT INTO Accounts (account_number,user_id,account_type) VALUES 
    (:an,:user_id,:account_type)";
    $id=get_user_id();    
    try{
        $stmt=$db->prepare($query);
        $stmt->execute(
            [":an" => null,
             ":user_id" => $id,
             ":account_type" => $type]
        );
        $last_id= $db->lastInsertId();
        $str='0123456789abcdefghijklmnopqrstuvwxyz';
        $lpad=substr(str_shuffle($str),0,12);
        $an= str_pad($last_id,12,$lpad,STR_PAD_LEFT);
        
        $query= "UPDATE Accounts SET account_number = :an WHERE id = :id";
        $stmt=$db->prepare($query);
        $stmt->execute([":an" => $an , ":id" =>$last_id]);
        
        deposit($last_id,$balance);
        
        flash("Account created Successfully", "success");
        die(header("Location: accounts.php"));
    }
    catch(PDOException $e){
        return flash("Error Failed to create the account", "danger");
    }
}
createAcc();
require(__DIR__ . "/../../partials/flash.php");
?>
<form method="POST" >
    <label for="type">Type</label>
    <select name="type" id="1" required>
        <option value=""></option>
        <option value="checking">Checking</option>
        <option value="savings">Savings</option>
    </select>
    <p>To open new account the minimum deposit amount is $5.</p>
    <p>Would you like to deposit $5 ?</p>
    <input type="radio" id="deposit_1" name="deposit_default" value="yes" required>
    <label for="deposit_1">Yes</label>
    <input type="radio" id="deposit_2" name="deposit_default" value="no" required>
    <label for="deposit_2">No</label><br>
    <label for="amount" id="amount">Enter amount in dollars: </label>
    <input type="number" id="amount" name="amount" required disabled min="5"><br>
    
    <input type="submit">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(
        ()=>{
            $("input[type=radio]#deposit_2").click(function(){
                $("input[type=number]#amount").prop("disabled",false);
                $("input[type=number]#amount").prop("required",true);
            });

            $("input[type=radio]#deposit_1").click(function(){
                $("input[type=number]#amount").prop("disabled",true);
                $("input[type=number]#amount").prop("required",false);
            });
            
        }
    );
</script>