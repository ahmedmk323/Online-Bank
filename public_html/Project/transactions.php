<?php
require_once(__DIR__."/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}

//echo "<pre>". se($_GET,null,false,false)."</pre>";
if(isset($_GET["account_id"])){
    $id= $_GET["account_id"];
    $t_query= "SELECT COUNT(1) as `total` FROM Transactions WHERE 1";
    $d_query="SELECT t2.user_id as src_id, t3.user_id as dest_id, t2.account_number AS src_acc,
    t3.account_number AS dest_acc, Transactions.transaction_type, Transactions.balance_change, Transactions.expected_total, Transactions.created, Transactions.memo
    FROM (Transactions
    INNER JOIN Accounts AS t2 ON Transactions.account_src= t2.id 
    INNER JOIN Accounts AS t3 ON Transactions.account_dest = t3.id)
    WHERE 1";
    $start= se($_GET,"start",date("Y-m-d", strtotime("-1 month")),false);
    $end= se($_GET,"end",date("Y-m-d", strtotime("+1 day")),false);
    $type= se($_GET, "type", false, false);
    $params= [];

    if($start){
        $t_query .= " AND Transactions.created >= :start";
        $d_query .= " AND Transactions.created >= :start";
        $params[":start"] = $start;
    }

    if($end){
        $t_query .= " AND Transactions.created <= :end";
        $d_query .= " AND Transactions.created <= :end";
        $params[":end"] = $end;
    }

    if($type && $type !== "none"){
        $t_query .= " AND Transactions.transaction_type = :type";
        $d_query .= " AND Transactions.transaction_type = :type";
        $params[":type"] = $type; 
    }
    $t_query .= " AND Transactions.account_src= :id";
    $d_query .= " AND Transactions.account_src= :id";
    $params[":id"] = $id;
    // Order By desc
    $t_query .= " ORDER BY Transactions.created DESC";
    $d_query .= " ORDER BY Transactions.created DESC";
        
    global $per_page;
    $per_page = 10;
    paginate($t_query,$params, $per_page); //paginate

    $d_query .= " LIMIT :offset, :limit";
    global $db;
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $stmt= $db->prepare($d_query);
    $results= [];
    try{
        global $total_pages;
        global $offset;
        global $page;
        $params[":offset"]= $offset;
        $params[":limit"]= $per_page;
        $stmt->execute($params);
        $results= $stmt->fetchAll();
    }
    catch(PDOException $e){
        var_export($e);
    }
    $results_transactions = $results;
}
?>

<div class="container-sm">
    <div class="row justify-content-center mt-2">
        <form method="GET" class="border rounded p-3">
            <input type="hidden" name="account_id" value="<?php se($_GET, "account_id");?>">
            <div class="input-group mb-3">
                <span class="input-group-text">Start</span>
                <input type="date" class="form-control" name="start" aria-label="Start">
                <span class="input-group-text">End</span>
                <input type="date" class="form-control" name="end">
                <span class="input-group-text">Type</span> 
                <select name="type" class="form-select">
                    <option value=""></option>
                    <option value="deposit">Deposit</option>
                    <option value="ext-transfer">External transfer</option>
                    <option value="transfer">Transfer</option>
                    <option value="withdraw">Withdraw</option>
                </select>
                <button type="submit" class="btn btn-primary"> Submit</button>
            </div>

            </form>
        </div>
        

<?php if(isset($results_transactions)): ?>
    <?php $account_info= getAccounts($_GET["account_id"]); ?>
    <div class="row mb-3">
        <table class="table table-striped">
            <p class="h2 p-0">Account Info</p>
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
    
    <div class="row">
            <p class="h2 p-0">Transactions History</p>
            <?php if ($results_transactions):?>
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col">Source</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Transaction Type</th>
                        <th scope="col">Change in balance</th>
                        <th scope="col">Expected Total</th>
                        <th scope="col">Memos</th>
                        <th scope="col">created</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($results_transactions as $key => $value): ?>
                    <tr scope="row"> 
                        <td><?php echo$value["src_acc"]; ?></td>
                        <td><?php
                        if($value["dest_id"] !== -1){
                            $user_id= se($value,"dest_id","",false);
                            $username= se($value,"dest_acc","",false);
                            include(__DIR__ ."/../../partials/profile_link.php");
                        }
                        else{
                            echo $value["dest_acc"];
                        }
                        ?></td>
                        <td><?php echo$value["transaction_type"];?></td>
                        <td>$<?php echo$value["balance_change"];?></td>
                        <td>$<?php echo$value["expected_total"];?></td>
                        <td><?php echo$value["memo"];?></td>
                        <td><?php echo$value["created"];?></td>
                    </tr>
                <?php endforeach?>
                </tbody>
            </table>
            <?php else:
                echo "<center> <h2>No Transactions Occurred</h2> </center>";
            endif;?>
        </div>
</div>       
    
<?php endif;?>
</div>

<?php include(__DIR__."/../../partials/pagination.php");?>

<?php require_once(__DIR__."/../../partials/flash.php");?>