<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="register">
    <form action="<?php echo URLROOT.'user/login'; ?>" method="post" autocomplete="off">

        <h1>Please Fill Your Login Form!</h1>
        <?php flash("register_success") ?>
        <?php flash("login_fail")?>
        <div class="input-group"> 
           <input type="email" name="email" class="form-control <?php echo !empty($data['email_err']) ? 'is-invalid' : ''; ?>" placeholder="Email">           
           <span class="invalid-feedback"><?php echo !empty($data['email_err']) ? $data['email_err'] : ''; ?></span>
        </div>
        <div class="input-group">
           <input type="password" name="password" class="form-control <?php echo !empty($data['password_err']) ? 'is-invalid' : ''; ?>" placeholder="Password">
           <span class="invalid-feedback"><?php echo !empty($data['password_err']) ? $data['password_err'] : ''; ?></span>
        </div>
        <div class="input-group">
           <input type="password" name="confirm_password" class="form-control <?php echo !empty($data['confirm_password_err']) ? 'is-invalid' : ''; ?>" placeholder="Confirm password">
           <span class="invalid-feedback"><?php echo !empty($data['confirm_password_err']) ? $data['confirm_password_err'] : ''; ?></span>
        </div>
        <input type="submit" name="submit" class="subtn" value="Login">
    </form>
</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
