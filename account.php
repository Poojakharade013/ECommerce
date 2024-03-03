<?php

session_start();
include('server/connection.php');

if(!isset($_SESSION['logged_in'])){
    header('location: login.php');
    exit;

}
if(isset($_GET['logout'])){
    if(isset($_SESSION['logged_in'])){
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_password']);
        header('location: login.php');
        exit;
    }
}


if(isset($_POST['change_password'])){

          $password = $_POST['password'];
          $confirmPassword = $_POST['confirmPassword'];
          $user_email = $_SESSION['user_email'];

          // if password dont match
          if($password !== $confirmPassword ){
            header('location: account.php?error=password dont match');

        // if password match
          }   else if(strlen($password)<6){
            header('location: account.php?error=password must be at least 6 characters');

          }else{
               
             $stmt= $conn->prepare("UPDATE users SET user_password = ? WHERE user_email = ? ");
             $stmt->bind_param('ss',md5($password),$user_email);

            if( $stmt->execute()){
              header('location:account.php?login_success=password has been updated successfully');
            }else{
              header('location:account.php?error=could not update password');

            }
          }
}



?>









<?php include('layouts/header.php');?>

   <!--ACCOUNT-->   
   <section class="my-5 py-5">
    <div class="row container mx-auto">
    <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
    <p class="text-center" style = "color:red"><?php if(isset($_GET['register'])){echo $_GET['register'];}?></p>
    <p class="text-center" style = "color:red"><?php if(isset($_GET['login_success'])){echo $_GET['login_success'];}?></p>


        <h3 class="font-weight-bold">ACCOUNT INFO</h3>
        <hr class="mx-auto">
        <div class="account-info">
            <p>NAME <span><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?></span></p>
            <p>EMAIL <span><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];} ?></span></p>
            <p><a href="" id="order-btn">YOUR ORDER</a></p>
            <p><a href="account.php?logout=1" id="logout-btn">LOGOUT</a></p>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12"> 
        <form action="account.php" id="account-form" method="POST">
          <p class="text-center" style = "color:red"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
          <p class="text-center" style = "color:green"><?php if(isset($_GET['message'])){echo $_GET['message'];}?></p>

            <h3>CHANGE PASSWORD</h3>
            <hr class="mx-auto">
            <div class="form-group">
                <label for="">PASSWORD</label>
                <input type="password" name="password" class="form-control" id="accont-password" placeholder="PASSWORD" required>
            </div>
            <div class="form-group">
                <label for="">CONFIRM PASSWORD</label>
                <input type="password" name="confirmPassword" class="form-control" id="accont-password-confirm" placeholder="CONFIRM PASSWORD" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Change Pasword" name="change_password" class="btn" id="change-pass-btn">
            </div>
        </form>
    </div>

    
    </div>
   </section>










   <?php include('layouts/footer.php');?>