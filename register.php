<?php

 session_start();


include('server/connection.php');

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
// if password dont match
    if($password !== $confirmPassword ){
        header('location: register.php?error=password dont match');
    
    // if password match
}   else if(strlen($password)<6){
        header('location: register.php?error=password must be at least 6 characters');

    
// if no error
}   else{


    
    //chech weather there is a user with this email
    $stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email=?");
    $stmt1->bind_param('s',$email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->store_result();
    $stmt1->fetch();
//if there is user already with this email
    if($num_rows != 0){
        header('location: register.php?error=user with this email already exists');
    }else{
        
        $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                         VALUES(?,?,?)");

        $stmt->bind_param('sss',$name,$email,md5($password));
    // IF ACCOUNT CREATED SUCCESSFULLY
       if( $stmt->execute()){
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $name;
            $_SESSION['logged_in'] = true;
            header('location: account.php?register=YOU REGISTERD SUCCESSFULLY');
       // NOT CREATED
        }else{
            header('location: register.php?error=could not create an account at the moment');

       }
    }


}
}else if(isset($_SESSION['logged_in'])){
    header('location:account.php');
    exit;
}







?>




<?php include('layouts/header.php');?>

   <!--REGISTER-->   
   <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">REGISTER</h2>
        <hr class="mx-auto">


    </div>
    <div class="max-auto container">
        <form id="register-form" method="POST" action="register.php">
            <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error']; }?></p>
            <div class="form-group">
                <label for="">NAME</label>
                <input type="text" class="form-control" id="register-name" name="name" placeholder="NAME" required />
            </div>
            <div class="form-group">
                <label for="">EMAIL</label>
                <input type="text" class="form-control" id="register-email" name="email" placeholder="EMAIL" required />
            </div>
            <div class="form-group">
                <label for="">PASSWORD</label>
                <input type="password" class="form-control" id="register-password" name="password" placeholder="PASSWORD" required />
            </div>
            <div class="form-group">
                <label for="">CONFIRM PASSWORD</label>
                <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="CONFIRM PASSWORD" required />
            </div>
            <div class="form-group">
                
                <input type="submit" class="btn" id="register-btn" name="register" value="REGISTER" />

            </div>
            <div class="form-group">
                
                <a id="register-url" href="login.php" class="btn" href="">DO YOU HAVE AN ACCOUNT? LOGIN</a>                
            </div>
        </form>

    </div>
   </section>










   <?php include('layouts/footer.php');?>