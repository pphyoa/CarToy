<?php
 require_once APPROOT."/views/inc/header.php"; 
 require_once APPROOT."/views/inc/nav.php";
?>

<div class="register">
    <form action="" method="post">
        <h1>Please Fill Your Register Form!</h1>
        <div class="input-group">
           <input type="text" name="username" class="form-control <?php echo !empty($data['name_err']) ? 'is-invalid' : '' ;?>" placeholder="Username">
           <span class="invalid-feedback"><?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?></span>
        </div>
        <div class="input-group"> 
           <input type="email" name="email" class="form-control <?php echo !empty($data['email_err']) ? 'is-invalid' : ''; ?>" placeholder="Email">           
           <span class="invalid-feedback"><?php echo !empty($data['email_err']) ? $data['email_err'] : ''; ?></span>
        </div>
        <div class="input-group">
           <input type="password" name="password" class="form-control <?php echo !empty($data['password_err']) ? 'is-invalid' : ''; ?>" placeholder="Password">
           <span class="invalid-feedback"><?php echo !empty($data['password_err']) ? $data['password_err'] : ''; ?></span>
        </div>
        <div class="input-group">
           <input type="text" name="address" class="form-control <?php echo !empty($data['address_err']) ? 'is-invalid' : ''; ?>" placeholder="Address">
           <span class="invalid-feedback"><?php echo !empty($data['address_err']) ? $data['address_err'] : ''; ?></span>
        </div>
        <div class="input-group">
           <input type="text" name="phone" class="form-control <?php echo !empty($data['phone_err']) ? 'is-invalid' : ''; ?>" placeholder="Phonenumber">
           <span class="invalid-feedback"><?php echo !empty($data['phone_err']) ? $data['phone_err'] : ''; ?></span>
        </div>
        <input type="submit" name="submit" class="subtn" value="Register">
    </form>
</div>

<?php require_once APPROOT."/views/inc/footer.php"; ?>
    
