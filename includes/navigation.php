<?php include 'includes/db.php';?>
<?php session_start(); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                    $query = "SELECT * FROM category LIMIT 3";
                    $result = mysqli_query($conn, $query);
                    if(!$result){
                        die("failed to execute properly");
                    }

                    while ($rows = mysqli_fetch_assoc($result)) {
                        $row = $rows['cat_title'];
                        $row_id = $rows['cat_id'];
                        echo "<li><a href='category.php?category=$row_id'>{$row}</a></li>";
                    }

                    ?>
                    
                    <?php
                        if($_SESSION['username']==null){
                            ?>
                        <li><a href="registration.php">Registration</a></li>
                        <li><a href="./login.php">Log In</a></li>
                        
                        <?php
                    }
                ?>
                    <?php
                    if($_SESSION['role'] == "Admin"){
                        ?>
                        <li><a href="admin">Admin</a></li>
                        
                        <?php
                        if(isset($_GET['p_id'])){
                            $the_post_id = $_GET['p_id'];
                            echo "<li><a href='admin/posts.php?source=edit_posts&p_id={$the_post_id}'>Edit This Post</a></li>";
                        }
                    }


                    ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>