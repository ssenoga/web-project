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
            }
             $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
                $result = mysqli_query($conn, $query);
                if(!$result){
                    die("failed to execute properly ".mysqli_error($conn));
                }

                while ($rows = mysqli_fetch_assoc($result)) {
                    $rows['post_title'];
                    $rows['post_author'];
                    $rows['post_date'];
                    $rows['post_content'];
                    $rows['post_image'];

            ?>

                <!--     <h1 class="page-header">
                        <h1>Page heading</h1>
                        <small>Secondary Text</small>
                    </h1> -->

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $rows['post_title'];?> </a>
                    </h2>
                    <p class="lead">
                        by <a href="author_posts.php?author=<?php echo $rows['post_author'];?>&p_id=<?php echo $rows['post_author'];?>"><?php echo $rows['post_author'];?> </a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $rows['post_date'];?> </p>
                    <hr>
                    <img class="img-responsive img-round" src="images/<?Php echo $rows['post_image'];?>" alt="" height="150" width="200">
                    <hr>
                    <p><?php echo $rows['post_content'];?> </p>

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


                
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="comment_author">Name<span> *</span></label>
                            <input type="text" class="form-control" name="comment_author" required="true">
                        </div>
                        <div class="form-group">
                            <label for="comment_email">Email<span> *</span></label>
                            <input type="email" name="comment_email" class="form-control" required="true">
                        </div>
                        <div class="form-group">
                            <label for="textarea">Comment<span> *</span></label>
                            <textarea class="form-control" rows="3" name="comment_content" required="true"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comments">Comment</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                     $query_comments = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                     $query_comments .= "AND comment_status = 'Approved' ";
                     $query_comments .= "ORDER BY comment_id DESC ";
                    $post_result = mysqli_query($conn, $query_comments);
                    if(!$post_result){
                        die("failed to execute properly".mysqli_error($conn));
                    }
                    while ($rows = mysqli_fetch_assoc($post_result)) {
                        $comment_id = $rows['comment_id'];
                        $comment_date = $rows['comment_date'];
                        $comment_content = $rows['comment_content'];
                        $comment_author = $rows['cooment_author'];
                    ?>
                    <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?> 
                            <small><?php echo $comment_date;?> </small>
                        </h4>
                        <?php echo $comment_content;?> 
                    </div>
                </div>

                <?php } ?>

                

                <!-- Comment -->
                
               
                </div>
           
            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/Sidebar.php';?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include 'includes/footer.php';?>
