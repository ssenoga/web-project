<?php include 'includes/header.php';?>

    <!-- Navigation -->
<?php include 'includes/navigation.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
            if(isset($_GET['p_id'])){
                $the_post_id = $_GET['p_id'];
                $the_post_author = $_GET['author'];
                echo "<h1 class='h1 bg-success text-center rounded px-4'>All Posts By {$the_post_author}</h1>";
            }
             $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}'";
                $result = mysqli_query($conn, $query);
                if(!$result){
                    die("failed to execute properly");
                }

                while ($rows = mysqli_fetch_assoc($result)) {
                    $rows['post_title'];
                    $rows['post_author'];
                    $rows['post_date'];
                    $row_content = substr($rows['post_content'], 0,100);
                    $rows['post_image'];

            ?>

                <!--     <h1 class="page-header">
                        <h1>Page heading</h1>
                        <small>Secondary Text</small>
                    </h1> -->

                    <!-- First Blog Post -->
                    <div class="bg-warning p-4">
                        <h2 class="display-4">
                        <a href="post.php?p_id=<?php echo $rows['post_id'];?>"><?php echo $rows['post_title'];?> </a>
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
                    </div>


                    <hr>
                <?php } ?>


                <?php
                    if(isset($_POST['create_comments'])){
                        $the_post_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];

                        $query = "INSERT INTO comments (comment_post_id,cooment_author,comment_email,comment_content,comment_status,comment_date) VALUES($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unproved',now())";
                        $create_comment = mysqli_query($conn,$query);
                        if(!$create_comment){
                            die("QUERY FAILED ".mysqli_error($conn));
                        }
                        $post_comment_increment = "UPDATE posts SET post_comments = post_comments + 1 WHERE post_id = $the_post_id";
                        $res = mysqli_query($conn,$post_comment_increment);
                    }

                ?>


                
               

                <hr>

                <!-- Posted Comments -->
               
                <!-- Comment -->
                
               
                </div>
           
            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/Sidebar.php';?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include 'includes/footer.php';?>
