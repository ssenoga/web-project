<?php include 'includes/header.php';?>

    <!-- Navigation -->
<?php include 'includes/navigation.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
            if(isset($_POST['submit'])){
                $search = $_POST['search'];
                $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                $result = mysqli_query($conn, $query);
                if(!$result){
                    die("failed to display the search".mysqli_error($conn));
                }
                $count = mysqli_num_rows($result);
                if($count < 0){
                    echo "<h2>No results found</h2>";
                } else{
                while ($rows = mysqli_fetch_assoc($result)) {
                    $rows['post_title'];
                    $rows['post_author'];
                    $rows['post_date'];
                    $row_content = substr($rows['post_content'], 0,500);
                    $rows['post_image'];
            ?>

                    <!-- <h1 class="page-header">
                        <h1>Page heading</h1>
                        <small>Secondary Text</small>
                    </h1> -->

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $rows['post_title'];?> </a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $rows['post_author'];?> </a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $rows['post_date'];?> </p>
                    <hr>
                    <img class="img-responsive img-round" src="images/<?Php echo $rows['post_image'];?>" alt="" height="150" width="200">
                    <hr>
                    <p><?php echo $row_content;?> </p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $rows['post_id'];?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                <?php }
                }
            }
            ?>
            </div>
           
            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/Sidebar.php';?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include 'includes/footer.php';?>
