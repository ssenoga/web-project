 <?php  include "includes/header.php"; ?>
 <?php  include "includes/navigation.php"; ?>
 <?php
if(isset($_POST['submit1'])){
    ?>
    <!-- Page Content -->
    <div class="container">
        <div class="jumbotron text-center text-capitalize">
            Thank you for contacting us we are working hard to always be in contact with you
        </div>
    <?php
} else {
    return header('Location: ./');
}
?>
   




<?php include "includes/footer.php";?>
