<?php
require_once(__DIR__."/../../partials/nav.php");
if (!is_logged_in()) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: login.php"));
}

function getAccounts(){
    $db= getDB();
    $user_id= get_user_id();
    $query= "SELECT * FROM Accounts WHERE user_id = :id LIMIT 5";
    try{
        $stmt= $db->prepare($query);
        $stmt->bindParam(":id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result= $stmt->fetchAll(PDO::FETCH_NAMED);        
    }
    catch(PDOException $e){
        return flash("No Accounts are found");
    }
    return $result;
}

$results= getAccounts();
if(!$results){
    echo "<center><h2>No accounts are found</h2></center>";
    die;
}
echo "<h2>My Accounts</h2>";
echo"
<table>
<thead>
    <tr>
        <th>Account Number</th>
        <th>Balance</th>
        <th>Type</th>
        <th>Modified</th>
    </tr>
</thead>";
foreach($results as $key => $value){
    echo 
    "<tr>
        <td id='acc'>$value[account_number]</td>
        <td>$$value[balance]</td>
        <td>$value[account_type]</td>
        <td>$value[modified]</td>
    </tr>";
}
echo "</table>";
echo "<button onclick=\"transactions()\">View Transactions History</button>";

?>
<div id="Transaction"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function transactions(){
    window.location.href= "transactions.php";
    }
</script>