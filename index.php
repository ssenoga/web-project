<?php include 'includes/header.php';?>

    <!-- Navigation -->
<?php include 'includes/navigation.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
                $query = "SELECT * FROM posts";
                $result = mysqli_query($conn, $query);
                if(!$result){
                    die("failed to execute properly ".mysqli_error($conn));
                }

                while ($rows = mysqli_fetch_assoc($result)) {
                    $post_id = $rows['post_id'];
                    $post_title = $rows['post_title'];
                    $post_author = $rows['post_author'];
                    $post_date = $rows['post_date'];
                    $row_content = substr($rows['post_content'], 0,500);
                    $post_image = $rows['post_image'];
                    $post_status = $rows['post_status']; 
                    if($post_status === 'varified'){
                    
                ?>
                       <!--  <h1 class="page-header">
                            <h1>Page heading</h1>
                            <small>Secondary Text</small>
                        </h1>
 -->
                        <!-- First Blog Post -->
                        <h2>
                            <a href="post.php?p_id=<?php echo $rows['post_id'];?>"><?php echo $rows['post_title'];?> </a>
                        </h2>
                        <p class="lead">
                            by <a href="author_posts.php?author=<?php echo $rows['post_author'];?>&p_id=<?php echo $rows['post_id'];?>"><?php echo $rows['post_author'];?> </a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $rows['post_date'];?> </p>
                        <hr>
                        <a href="post.php?p_id=<?php echo $rows['post_id'];?>">
                        <img class="img-responsive img-round" src="images/<?Php echo $rows['post_image'];?>" alt="" height="150" width="200"></a>
                        <hr>
                        <p><?php echo $row_content;?> </p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $rows['post_id'];?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                <?php }  } ?>
                </div>
           
            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php';?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include 'includes/footer.php';?>
