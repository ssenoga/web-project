 <?php  include "includes/header.php"; ?>
 <?php  include "includes/navigation.php"; ?>
    <!-- Navigation --> 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                    
                <h1>Log In Here</h1>
                    <form role="form" action="includes/login.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" >username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Your Username">
                        </div>
                         
                         <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="login" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Log In">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
