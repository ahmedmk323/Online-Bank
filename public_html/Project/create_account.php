<?php
require_once(__DIR__."/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}

if(isset($_POST["submit"])){
    if(isset($_POST["type"]) && isset($_POST["deposit_default"])){
        $type= $_POST["type"];
        if ($_POST["deposit_default"] == "yes"){
            $balance= 5;
        }
        else{
            $balance= $_POST["amount"];
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
            flash("Error Failed to create the account", "danger");
        }
    }
    else{
        flash("Missing one or more Entries", "danger");
    }
    
}
require(__DIR__ . "/../../partials/flash.php");
?>
<?php 
$db= getDB();
$stmt=$db->prepare("SELECT SysProps.value FROM SysProps WHERE property = 'APY'");
$stmt->execute();
$apy = $stmt -> fetch(PDO::FETCH_ASSOC);
$apy= floatval($apy["value"]);

?>
<div class="container col-5">
    <h2>Create Account</h2>
    <form class="p-3" method="POST" >
        <div class="input-group mb-3">
            <span class="input-group-text">Type</span>
            <select name="type"class="form-select" id="type" required>
                <option value=""></option>
                <option value="checking">Checking</option>
                <option value="savings">Savings</option>
            </select>
        </div>
        <div class="mb-2" id="apy" hidden>
            (APY: <?php echo ($apy * 100);?>%)
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="The annual percentage yield (APY) is the real rate of return earned on an investment, taking into account the effect of compounding interest.">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                </svg>
            </a>
        </div>
        
        <p>To open new account the minimum deposit amount is $5.</p>
        <p>Would you like to deposit $5 ?</p>
        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="deposit_1" name="deposit_default" value="yes" required>
            <label for="deposit_1" class="form-check-label">Yes</label>
        </div>
        <div class="form-check form-check-inline mb-2">
            <input type="radio" id="deposit_2" class="form-check-input" name="deposit_default" value="no" required>
            <label for="deposit_2" class="form-check-label">No</label><br>
        </div>
        <div class="mb-1">
            <label for="amount">Enter amount in dollars:</label>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="amount">$</span>
            <input type="number" class="form-control" id="amount" name="amount" required disabled min="5"><br>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary row justify-content-center" name="submit">      
        </div>
    </form>
</div>
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

            $("select#type").change( function(){
                const type= $(this).val();
                if(type === "savings"){
                    $("#apy").prop("hidden", false);
                }
                else{
                    $("#apy").prop("hidden", true);
                }
            })
            
        }
    );
</script>