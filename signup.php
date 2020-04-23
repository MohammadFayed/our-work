<?php
    session_start();
    $page_name = "signup";
    include "header.php";
    if(isset($_SESSION['username'])){
        header("Location: dashboard.php");
    }else{
        
    
        if(isset($_POST['signup'])){

            require_once "check.php";
        }
    }

?>
<!DOCTYPE html>
<html>
<body class="signup">
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" >
    <div class="container" >
        <div class="mycontainer">
            <?php if (isset($dbcheck)) { ?>
            <div class="alert alert-danger" role="alert">
                 <?php echo $dbcheck."</div>"; }  ?>
            

          <div class="form-group has-feedback">
            <label for="fullname">full name</label>
              <label for="error" class="err"><?php if(isset($fullnameErr)){ echo $fullnameErr; } ?></label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-user-tie"></i></span>
                <input type="text" class="form-control input-lg" value="<?php if(isset($_POST['fullname'])){ echo $_POST['fullname']; } ?>" name="fullname" placeholder="Full Name" autocomplete="off" >
              </div>
          </div>
          <div class="form-group">
            <label for="username">username</label>
              <label for="error" class="err"><?php if(isset($usernameErr)){ echo $usernameErr; } ?></label>
               <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control input-lg" value="<?php if(isset($_POST['fullname'])){ echo $_POST['username']; } ?>" name="username" placeholder="User Name" autocomplete="off" >
               </div>          
          </div>
          <div class="form-group">
            <label for="username">e-Mail</label>
              <label for="error" class="err"><?php if(isset($emailErr)){ echo $emailErr; } ?></label>
               <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                <input type="text" class="form-control input-lg" value="<?php if(isset($_POST['fullname'])){ echo $_POST['email']; } ?>" name="email" placeholder="Your Email" autocomplete="off">
               </div>          
          </div>
          <div class="form-group">
            <label for="username">password</label>
              <label for="error" class="err"><?php if(isset($passwordErr)){ echo $passwordErr; } ?></label>
               <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control input-lg" value="<?php if(isset($_POST['fullname'])){ echo $_POST['password']; } ?>" name="password" placeholder="Your Password" autocomplete="new-password">
               </div>          
          </div>
            <div class="form-group">
                <div class="radio-inline">
                  <label>
                    <input type="radio" name="sex" id="sex" value="Male" checked>
                    Male
                  </label>
                </div>
                <div class="radio-inline">
                  <label>
                    <input type="radio" name="sex" id="sex" value="Female">
                    Female
                  </label>
                </div>
            </div>
            <input type="submit" class="btn" name="signup" value="Sign Up" />
        </div>
    </div>
</form>
</body>
</html>