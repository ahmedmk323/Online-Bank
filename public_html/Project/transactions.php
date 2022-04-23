<?php
require_once(__DIR__."/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}

function getTransactionTable(){
    $db= getDB();
    $id= get_user_id();
    $query= "SELECT * FROM (Transactions INNER JOIN Accounts ON Transactions.account_src = Accounts.id)
    WHERE Accounts.user_id = :id  ORDER BY Transactions.modified DESC LIMIT 10";
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
$results=getTransactionTable();
if (!$results){
    echo "<h2>No Transactions Occurred</h2>";
    die;
}
?>
<h2>Transactions History</h2>
<table>
    <thead>
        <tr>
            <th>Source</th>
            <th>Destination</th>
            <th>Transaction Type</th>
            <th>Change in balance</th>
            <th>Expected Total</th>
            <th>Memos</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($results as $key => $value): ?>
        <tr> 
            <td><?php echo $value["account_src"];?></td>
            <td><?php echo$value["account_dest"];?></td>
            <td><?php echo$value["transaction_type"];?></td>
            <td>$<?php echo$value["balance_change"];?></td>
            <td>$<?php echo$value["expected_total"];?></td>
            <td><?php echo$value["memo"];?></td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>