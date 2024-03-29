<?php
require_once(__DIR__ . "/../../partials/nav.php");
if (!is_logged_in()) {
    die(header("Location: login.php"));
}
?>
<?php

$user_id= se($_GET,"id",get_user_id(),false);
$isMe= $user_id == get_user_id();
$isEdit= isset($_GET["edit"]);
if (isset($_POST["save"]) && $isMe && $isEdit) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $fn = se($_POST, "fn", null, false);
    $ln = se($_POST, "ln", null, false);
    $visibility= isset($_POST["vis"]) ? 1 : 0;

    $params = [":email" => $email, ":username" => $username, ":id" => get_user_id(), ":fn" => $fn, ":ln" => $ln, ":visibility" => $visibility];
    $db = getDB();
    $stmt = $db->prepare("UPDATE Users set email = :email, username = :username, first_name = :fn, last_name = :ln, visibility = :visibility where id = :id");
    try {
        $stmt->execute($params);
        flash("Profile saved", "success");
    } catch (Exception $e) {
        if ($e->errorInfo[1] === 1062) {
            //https://www.php.net/manual/en/function.preg-match.php
            preg_match("/Users.(\w+)/", $e->errorInfo[2], $matches);
            if (isset($matches[1])) {
                flash("The chosen " . $matches[1] . " is not available.", "warning");
            } else {
                //TODO come up with a nice error message
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        } else {
            //TODO come up with a nice error message
            echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        }
    }
    

    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        if ($new_password === $confirm_password) {
            //TODO validate current
            $stmt = $db->prepare("SELECT password from Users where id = :id");
            try {
                $stmt->execute([":id" => get_user_id()]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (isset($result["password"])) {
                    if (password_verify($current_password, $result["password"])) {
                        $query = "UPDATE Users set password = :password where id = :id";
                        $stmt = $db->prepare($query);
                        $stmt->execute([
                            ":id" => get_user_id(),
                            ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                        ]);

                        flash("Password reset", "success");
                    } else {
                        flash("Current password is invalid", "warning");
                    }
                }
            } catch (Exception $e) {
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        } else {
            flash("New passwords don't match", "warning");
        }
    }
}
//select fresh data from table
$db = getDB();
$stmt = $db->prepare("SELECT id, email, username, first_name, last_name, created, visibility from Users where id = :id LIMIT 1");
$isVisible= false;
try {
    $stmt->execute([":id" => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if ($isMe){
            //$_SESSION["user"] = $user;
            $_SESSION["user"]["email"] = $user["email"];
            $_SESSION["user"]["username"] = $user["username"];
            $_SESSION["user"]["first_name"] = $user["first_name"];
            $_SESSION["user"]["last_name"] = $user["last_name"];
        }
        if(se($user,"visibility",0,false) > 0){
            $isVisible = 1;
        }
        $email = get_user_email();
        $username = get_username();
        $joined= se($user,"created", "", false);
        $fn= se($user,"first_name","",false);
        $ln= se($user,"last_name","",false);
        error_log("Query data: " . var_export($user, true));
    } else {
        flash("User doesn't exist", "danger");
    }
} catch (Exception $e) {
    flash("An unexpected error occurred, please try again", "danger");
    //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
}
?>

<div class="container">
    <?php if($isMe && $isEdit): ?>
        <?php if ($isMe):?>
            <a href="<?php echo get_url("profile.php")?>">View Profile</a>
        <?php endif;?>
        <form method="POST" class="p-3" onsubmit="return validate(this);">
            <div class="row g-2">
                <div class="col mb-3">
                    <label for="fn" class="form-label">First name</label>
                    <input type="text" class="form-control" id="fn" name="fn" value="<?php se($fn); ?>">
                </div>
                <div class="col">
                    <label for="ln" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="ln" name="ln" value="<?php se($ln); ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php se($email); ?>" />
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="<?php se($username); ?>" />
            </div>
            <!-- DO NOT PRELOAD PASSWORD -->
            <div>Password Reset</div>
            <div class="mb-3">
                <label for="cp" class="form-label">Current Password</label>
                <input type="password" class="form-control" name="currentPassword" id="cp" />
            </div>
            <div class="mb-3">
                <label for="np" class="form-label">New Password</label>
                <input type="password" class="form-control" name="newPassword" id="np" />
            </div>
            <div class="mb-3">
                <label for="conp" class="form-label">Confirm Password</label>
                <input type="password"class="form-control"  name="confirmPassword" id="conp" />
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="vis" name="vis"
                    <?php if($isVisible){
                        echo "checked";
                    }
                    ?>>
                <label class="form-check-label" for="vis">Toggle Visibility</label>
            </div>
            <div class="row justify-content-center">
                <input type="submit" class="btn btn-info" value="Update Profile" name="save" />
            </div>
        </form>
    
    <?php else: ?>
        <?php if($isMe): ?>
            <a href="?edit">Edit Profile</a>
        <?php endif;?>
        <?php if($isMe || $isVisible): ?>
            <h2><?php echo($fn." ".$ln);?></h2>
            <h3><?php echo("Date Joined: ".$joined);?></h3>
        <?php else: 
            flash("Profile is private", "warning");
            die(header("Location: home.php"));
        endif;?>
            
    <?php endif; ?>
</div>

<script>
    function validate(form) {
        let email= form.email.value;
        let username= form.username.value;
        let current_pw= form.currentPassword.value;
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        let isValid = true;
        //TODO add other client side validation....
        
        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
            flash("Invalid email address", "warning");
            isValid= false;
        }
        
        if (!(/^[a-z0-9_-]{3,16}$/.test(username))){
            flash("Invalid Username (JS)");
            isValid= false;
        }
        
        if (pw. length != current_pw.length){
            flash("New Password length doesn't match Current password length");
            isValid=false;
        }
        //example of using flash via javascript
        //find the flash container, create a new element, appendChild
        if (pw !== con) {
            //find the container
            let flash = document.getElementById("flash");
            //create a div (or whatever wrapper we want)
            let outerDiv = document.createElement("div");
            outerDiv.className = "row justify-content-center";
            let innerDiv = document.createElement("div");

            //apply the CSS (these are bootstrap classes which we'll learn later)
            innerDiv.className = "alert alert-warning";
            //set the content
            innerDiv.innerText = "Password and Confirm password must match";

            outerDiv.appendChild(innerDiv);
            //add the element to the DOM (if we don't it merely exists in memory)
            flash.appendChild(outerDiv);
            isValid = false;
        }
        return isValid;
    }
</script>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>