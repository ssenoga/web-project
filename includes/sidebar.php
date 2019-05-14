<div class="col-md-4">
    <?php
    if(isset($_POST['submit'])){
        $search = $_POST['search'];
        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("failed to display the search".mysqli_error($conn));
        }
        $count = mysqli_num_rows($result);
        if(!$count){
            echo "<h2>No results found</h2>";
        }
    }
    ?>

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <form action="search.php" method="POST">
                <div class="input-group">
                    <input name="search" type="text" class="form-control">
                    <span class="input-group-btn">
                        <button name="submit" class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
            </form>
            <!-- /.input-group -->
        </div>
        <!-- log in form -->
         <div class="well">
            <h4>Log in</h4>
            <form action="includes/login.php" method="POST">
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Enter Username">
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    <span class="input-group-btn">
                        <button name="login" class="btn btn-primary" type="submit">Log in</button>
                    </span>
                </div>
            </form>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <?php
                $query = "SELECT * FROM category";
                $result = mysqli_query($conn, $query);
                if(!$result){
                    die("failed to execute properly");
                }
            ?>
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled">
                        <?php
                            while ($rows = mysqli_fetch_assoc($result)) {
                            $row = $rows['cat_title'];
                            $row_id = $rows['cat_id'];
                            echo "<li><a href='category.php?category=$row_id'>{$row}</a></li>";
                        }
                        ?>
                        
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
       <?php include 'widgets.php';?>
    </div>
</div>