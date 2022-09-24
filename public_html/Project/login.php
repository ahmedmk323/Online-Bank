<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<div class="container mt-5">
    <form class="p-3 rounded-2" onsubmit="return validate(this)" method="POST" style="max-width: 250px; margin:auto">
        <div class="mb-3">
            <label for="email" class="form-label">Email/Username</label>
            <input type="text" class="form-control" name="email" />
        </div>
        <div class="mb-3">
            <label for="pw" class="form-label">Password</label>
            <input type="password" class="form-control" id="pw" name="password"/>
        </div>
        <div class="container text-center">
            <input type="submit" class= "btn btn-primary" value="Login" />
        </div>
    </form>
   
    
</div>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        
        let isValid= true;
        let email= form.email.value;
        const password= form.password.value;
        
        if (!email){
            flash("Email must not be empty (JS)" , "warning");
            isValid= false;
        }
        // Check for valid email
        if (email.includes("@")){
            email= email.trim();
            const REGEX= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!(REGEX.test(email))){
                flash("Invalid email address (JS)", "warning");
                isValid= false;
            }
        }
        else{
            const REGEX_2=/^[a-z0-9_-]{3,16}$/;
            if (!(REGEX_2.test(email))){
                flash("Invalid username (JS)", "warning");
                isValid= false;
            }
        }

        if(!password){
            flash("Password must not be empty (JS)", "warning");
            return false;
        }

        if(password.length < 8){
            flash("Password is to short (JS)", "warning");
            isValid= false;
        }
        //TODO update clientside validation to check if it should
        //valid email or username
        return isValid;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);

    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty");
        $hasError = true;
    }
    if (str_contains($email, "@")) {
        //sanitize
        //$email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = sanitize_email($email);
        //validate
        /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            flash("Invalid email address");
            $hasError = true;
        }*/
        if (!is_valid_email($email)) {
            flash("Invalid email address");
            $hasError = true;
        }
    } else {
        if (!is_valid_username($email)) {
            flash("Invalid username");
            $hasError = true;
        }
    }
    if (empty($password)) {
        flash("password must not be empty");
        $hasError = true;
    }
    if (!is_valid_password($password)) {
        flash("Password too short");
        $hasError = true;
    }
    if (!$hasError) {
        //flash("Welcome, $email");
        //TODO 4
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, username, password, first_name, last_name from Users 
        where email = :email or username = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        //flash("Weclome $email");
                        $_SESSION["user"] = $user; //sets our session data from db
                        //lookup potential roles
                        $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                        JOIN UserRoles on Roles.id = UserRoles.role_id 
                        where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");
                        $stmt->execute([":user_id" => $user["id"]]);
                        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                        //save roles or empty array
                        if ($roles) {
                            $_SESSION["user"]["roles"] = $roles; //at least 1 role
                        } else {
                            $_SESSION["user"]["roles"] = []; //no roles
                        }
                        if(isset($_SESSION["user"]["first_name"])){
                            flash("Welcome, " . get_user_first_name() . " ". get_user_last_name(). '!');
                        }
                        else
                            flash("Welcome, " . get_username());
                        die(header("Location: home.php"));
                    } else {
                        flash("Invalid password");
                    }
                } else {
                    flash("Email not found");
                }
            }
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");