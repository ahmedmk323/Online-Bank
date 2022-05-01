<?php
require_once(__DIR__."/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}

function getTransactionTable($id){
    $db= getDB();
    $query="SELECT *, t2.account_number AS src_acc,
    t3.account_number AS dest_acc
    FROM (Transactions
    INNER JOIN Accounts AS t2 ON Transactions.account_src= t2.id 
    INNER JOIN Accounts AS t3 ON Transactions.account_dest = t3.id)
    WHERE Transactions.account_src= :id
    ORDER BY Transactions.modified DESC LIMIT 10";
    $stmt= $db->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    try{
        $stmt->execute();
        $results= $stmt->fetchAll();
    }
    catch(PDOException $e){
        return var_export($e->errorInfo);
    }
    return $results;
}
?>

<?php 
if(isset($_POST["account_id"])){
    $results_transactions=getTransactionTable($_POST["account_id"]);
    if (!$results_transactions){
        echo "<h2>No Transactions Occurred</h2>";
        die;
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <form method="POST" class="border rounded w-50 p-3">
                <div>
                    <label for="" class="form-label">Select which account would you like to view:</label>
                    <select name="account_id" class="form-select" required>
                        <option value=""></option>
                        <?php $results= getAccounts();?>
                        <?php foreach($results as $key => $value):?>
                            <option value="<?php se($value["id"]);?>"><?php se($value["account_number"]);?></option>
                        <?php endforeach;?>		
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary"> Submit</button>
                </div>            
            </form>
        
    


<?php if(isset($results_transactions)): ?>
    <?php $account_info= getAccounts($_POST["account_id"]); ?>
    <table class="table">
        <thead>
            <th scope="col">Account number</th>
            <th scope="col">Type</th>
            <th scope="col">Balance</th>
            <th scope="col">Opened</th>
            <th scope="col">Modified</th>
        </thead>
        <tbody>  
            <tr scope="row">
                <td> <?php echo $account_info[0]["account_number"];?></td>
                <td> <?php echo $account_info[0]["account_type"];?></td>
                <td> <?php echo $account_info[0]["balance"];?></td>
                <td> <?php echo $account_info[0]["created"];?></td>
                <td> <?php echo $account_info[0]["modified"];?></td>
            </tr>
        </tbody>
    </table>
    </div>   
    <div class="col-6">
            <h2>Transactions History</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Source</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Transaction Type</th>
                        <th scope="col">Change in balance</th>
                        <th scope="col">Expected Total</th>
                        <th scope="col">Memos</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($results_transactions as $key => $value): ?>
                    <tr scope="row"> 
                        <td><?php echo $value["src_acc"];?></td>
                        <td><?php echo$value["dest_acc"];?></td>
                        <td><?php echo$value["transaction_type"];?></td>
                        <td>$<?php echo$value["balance_change"];?></td>
                        <td>$<?php echo$value["expected_total"];?></td>
                        <td><?php echo$value["memo"];?></td>
                    </tr>
                <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>       
    
<?php endif;?>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<style>
    body{
        background-color: aquamarine;
    }
</style>