<?php
//TODO 1: require db.php
require_once(__DIR__ . "/db.php");
//This is going to be a helper for redirecting to our base project path since it's nested in another folder
//This MUST match the folder name exactly
$BASE_PATH = '/Project';
//TODO 4: Flash Message Helpers
require(__DIR__ . "/flash_messages.php");

//require safer_echo.php
require(__DIR__ . "/safer_echo.php");
//TODO 2: filter helpers
require(__DIR__ . "/sanitizers.php");

//TODO 3: User helpers
require(__DIR__ . "/user_helpers.php");


//duplicate email/username
require(__DIR__ . "/duplicate_user_details.php");
//reset session
require(__DIR__ . "/reset_session.php");

require(__DIR__ . "/get_url.php");
function deposit($id, $amount, $msg= ""){
    $db= getDB();
    $query= "INSERT INTO Transactions (account_src,account_dest,balance_change,transaction_type,memo,expected_total) VALUES 
    (:src, :dest, :balance_c,:transcation_type, :msg, :expected_total)"; 
    $stmt=$db->prepare($query);
    $col_ids=array();
    try{
        $stmt->execute([":src" => 1 , ":dest" => $id, ":balance_c" => -$amount, ":transcation_type" => "deposit",":msg"=> $msg, ":expected_total" =>0]);
        array_push($col_ids,$db->lastInsertId());
        $stmt->execute([":src" => $id , ":dest" => 1, ":balance_c" => $amount, ":transcation_type" => "deposit","msg"=> $msg, ":expected_total" =>0]);
        array_push($col_ids,$db->lastInsertId());
        $ids=array(1,$id);

        foreach($ids as $key => $id){
            $query= "UPDATE Accounts set balance = (SELECT IFNULL(SUM(balance_change), 0) FROM Transactions where Transactions.account_src = :account_id) WHERE id = :account_id";
            $stmt=$db->prepare($query);
            $stmt->execute([":account_id" =>$id,":account_id" =>$id]);
            
            $query="SELECT balance FROM Accounts where id = :account_id";
            $stmt=$db->prepare($query);
            $stmt->execute([":account_id" =>$id]);

            $result= $stmt->fetch(PDO::FETCH_ASSOC); 
            $amount= $result["balance"];
            $query= "UPDATE Transactions SET expected_total = :total WHERE id = :id";
            $stmt=$db->prepare($query);
            if ($id == 1) 
                $dest= $col_ids[0];
            else $dest = $col_ids[1];
            $stmt->execute([":total"=> $amount, ":id"=>$dest]);
        }
    }
    catch(PDOException $e){
        return var_export($e->errorInfo);
    }
}

function withdraw($id, $amount, $msg= ""){
    $db= getDB();
    $query= "INSERT INTO Transactions (account_src,account_dest,balance_change,transaction_type,memo,expected_total) VALUES 
    (:src, :dest, :balance_c,:transcation_type, :msg, :expected_total)"; 
    $stmt=$db->prepare($query);
    $col_ids=array();
    try{
        $stmt->execute([":src" => 1 , ":dest" => $id, ":balance_c" => $amount, ":transcation_type" => "withdraw",":msg"=> $msg, ":expected_total" =>0]);
        array_push($col_ids,$db->lastInsertId());
        $stmt->execute([":src" => $id , ":dest" => 1, ":balance_c" => -$amount, ":transcation_type" => "withdraw","msg"=> $msg, ":expected_total" =>0]);
        array_push($col_ids,$db->lastInsertId());
        $ids=array(1,$id);

        foreach($ids as $key => $id){
            $query= "UPDATE Accounts set balance = (SELECT IFNULL(SUM(balance_change), 0) FROM Transactions where Transactions.account_src = :account_id) WHERE id = :account_id";
            $stmt=$db->prepare($query);
            $stmt->execute([":account_id" =>$id,":account_id" =>$id]);
            
            $query="SELECT balance FROM Accounts where id = :account_id";
            $stmt=$db->prepare($query);
            $stmt->execute([":account_id" =>$id]);

            $result= $stmt->fetch(PDO::FETCH_ASSOC); 
            $amount= $result["balance"];
            $query= "UPDATE Transactions SET expected_total = :total WHERE id = :id";
            $stmt=$db->prepare($query);
            if ($id == 1) 
                $dest= $col_ids[0];
            else $dest = $col_ids[1];
            $stmt->execute([":total"=> $amount, ":id"=>$dest]);
        }
    }
    catch(PDOException $e){
        return var_export($e->errorInfo);
    }
}

function transfer($src_acc_id, $dest_acc_id, $amount, $msg= ""){
    $db= getDB();
    $query= "INSERT INTO Transactions (account_src,account_dest,balance_change,transaction_type,memo,expected_total) VALUES 
    (:src, :dest, :balance_c,:transcation_type, :msg, :expected_total)"; 
    $stmt=$db->prepare($query);
    $col_ids=array();
    try{
        $stmt->execute([":src" => $src_acc_id, ":dest" => $dest_acc_id, ":balance_c" => -$amount, ":transcation_type" => "transfer",":msg"=> $msg, ":expected_total" =>0]);
        array_push($col_ids,$db->lastInsertId());
        $stmt->execute([":src" => $dest_acc_id, ":dest" => $src_acc_id, ":balance_c" => $amount, ":transcation_type" => "transfer","msg"=> $msg, ":expected_total" =>0]);
        array_push($col_ids,$db->lastInsertId());
        $ids=array($src_acc_id, $dest_acc_id);

        foreach($ids as $key => $id){
            $query= "UPDATE Accounts set balance = (SELECT IFNULL(SUM(balance_change), 0) FROM Transactions where Transactions.account_src = :account_id) WHERE id = :account_id";
            $stmt=$db->prepare($query);
            $stmt->execute([":account_id" =>$id,":account_id" =>$id]);
            
            $query="SELECT balance FROM Accounts where id = :account_id";
            $stmt=$db->prepare($query);
            $stmt->execute([":account_id" =>$id]);

            $result= $stmt->fetch(PDO::FETCH_ASSOC); 
            $amount= $result["balance"];
            $query= "UPDATE Transactions SET expected_total = :total WHERE id = :id";
            $stmt=$db->prepare($query);
            $stmt->execute([":total"=> $amount, ":id"=>$col_ids[$key]]);
        }
    }
    catch(PDOException $e){
        return var_export($e->errorInfo);
    }
}
/**Function to get all accounts or a single account using account id */
function getAccounts($aid=0){
    $db= getDB();
    if($aid){
        $query= "SELECT * FROM Accounts WHERE id = :id";
        $stmt= $db->prepare($query);
        $stmt->bindParam(":id", $aid, PDO::PARAM_INT);  
    }
    else{
        $user_id= get_user_id();
        $query= "SELECT * FROM Accounts WHERE user_id = :id LIMIT 5";
        $stmt= $db->prepare($query);
        $stmt->bindParam(":id", $user_id, PDO::PARAM_INT);
    }
    
    try{
        $stmt->execute();
        $result= $stmt->fetchAll(PDO::FETCH_NAMED);        
    }
    catch(PDOException $e){
        return flash("No Accounts are found");
    }
    return $result;
}
/**Function to check account balance takes in account id and returns balance */
function inquiryBalance($id){
    $db= getDB();
    $query= "SELECT balance FROM Accounts WHERE id = :id";
    $stmt= $db-> prepare($query);
    try{
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result= $stmt->fetchAll();   
    }
    catch(PDOException $e){
        var_export($e);
    }
    return $result;
}
//paginate
require(__DIR__. "/paginate.php");
?>