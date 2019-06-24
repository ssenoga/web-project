 <?php  include "includes/header.php"; ?>
 <?php  include "includes/navigation.php"; ?>
 <?php
if(isset($_POST['submit1'])){
    $head = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $to = "senoeddie@gmail.com";
    // the mail function (in-built php function)
    mail($to, $subject, $body,$head);
    return header('Location: thank-you.php');
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
                    
                <h1 class="text-center">Contact us</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address">
                        </div>
                         <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                        </div>
                         <div class="form-group">
                            <textarea class="form-control" cols="50" rows="20" name="body"></textarea>
                        </div>
                
                        <input type="submit" name="submit1" id="btn-login" class="btn btn-success btn-lg btn-block" value="Send">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
