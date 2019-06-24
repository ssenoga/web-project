 <?php  include "includes/header.php"; ?>
 <?php  include "includes/navigation.php"; ?>
 <?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = mysqli_real_escape_string($conn,$username);
    $email = mysqli_real_escape_string($conn,$email);
    $password = mysqli_real_escape_string($conn,$password);
    if(!empty($username) && !empty($email) && !empty($password)) {
        $query = "SELECT randsalt FROM users";
        $query_results = mysqli_query($conn,$query);
        if(!$query_results){
            die("QUERY FAILED ".mysqli_error($conn));
        }
        $row = mysqli_fetch_assoc($query_results);
        $randsalt = $row['randsalt'];
        $password = crypt($password,$randsalt);

        $query_register = "INSERT INTO users(username,user_email,user_password,user_role) ";
        $query_register .= "VALUES('{$username}','{$email}','{$password}','subscriber')";
        $query_results = mysqli_query($conn,$query_register);

        if(!$query_results){
            die("QUERY FAILED ".mysqli_error($conn));
        } else {
            // return header('Location: ./');
            $message = "<a href='./' class='btn btn-success'>Success Registeration</a>";
        }
    }else {
        $message = "This field should not be empty";
    }
} else {
    $message = "";
}

 ?>


    <!-- Navigation -->
    
    
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                    
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                            <h6 style="color: red;"><?php echo $message;?></h6>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            <h6 style="color: red;"><?php echo $message;?></h6>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            <h6 style="color: red;"><?php echo $message;?></h6>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
