<?php
require(__DIR__ . "/../../partials/nav.php");
reset_session();
?>
<div class="container">
    <form onsubmit="return validate(this)" method="POST" style="max-width: 300px; margin:auto; padding: 2%;">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required />
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required maxlength="30" />
        </div>
        <div class="mb-3">
            <label for="pw" class="form-label">Password</label>
            <input type="password" class="form-control" id="pw" name="password" required minlength="8" />
        </div class="mb-3">
        <div class="mb-3">
            <label for="confirm" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm" required minlength="8" />
        </div>
        <div>
            <input type="submit" class="btn btn-primary" value="Register" />
        </div>
    </form>
    
</div>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        let isValid= true;
        let email= form.email.value;
        const username= form.username.value;
        const password= form.password.value;
        const con= form.confirm.value;

        if (!email){
            flash("Email must not be empty (JS)" , "danger");
            isValid= false;
        }

        // Check for valid email
        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
            flash("Invalid email address (JS)", "danger");
            isValid= false;
        }
        
        // Check for username email
        if (!(/^[a-z0-9_-]{3,16}$/.test(username))){
            flash("Invalid Username (JS)","danger");
            isValid= false;
        }

        // Check if password is empty
        if (!password){
            flash("Password can not be empty (JS)","danger");
            isValid=false;
        }

        // Check if confirm is empty
        if (!con){
            flash("Password can not be empty (JS)", "danger");
            isValid=false;
        }

        // Check if password length is less than 8 characters
        if(password.length < 8){
            flash("Password is to short (JS)", "danger");
            isValid= false;
        }

        // Check if password matches confirm password
        if(password !== con){
            flash("Passwords must match (JS)","danger");
            isValid=false;
        }

        return isValid;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se(
        $_POST,
        "confirm",
        "",
        false
    );
    $username = se($_POST, "username", "", false);
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!preg_match('/^[a-z0-9_-]{3,16}$/', $username)) {
        flash("Username must only contain 3-30 characters a-z, 0-9, _, or -", "danger");
        $hasError = true;
    }
    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty", "danger");
        $hasError = true;
    }
    if (strlen($password) < 8) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (
        strlen($password) > 0 && $password !== $confirm
    ) {
        flash("Passwords must match", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password, username) VALUES(:email, :password, :username)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username]);
            flash("Successfully registered!", "success");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
    }
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>