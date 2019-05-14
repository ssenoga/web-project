<?php include 'includes/header.php';?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/nav.php';?>
        <!-- Navigation collapse -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                            $query = "SELECT * FROM posts";
                            $query_results = mysqli_query($conn,$query);
                            $query_count = mysqli_num_rows($query_results);
                        ?>
                  <div class='huge'><?php echo $query_count;?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                   <?php
                        $query = "SELECT * FROM comments";
                        $query_result = mysqli_query($conn,$query);
                        $comment_count = mysqli_num_rows($query_result);
                    ?>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php echo $comment_count;?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <?php
                        $query = "SELECT * FROM users";
                        $query_result = mysqli_query($conn,$query);
                        $users_count = mysqli_num_rows($query_result);
                    ?>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $users_count;?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <?php
                        $query = "SELECT * FROM category";
                        $results = mysqli_query($conn,$query);
                        $category_count = mysqli_num_rows($results);
                    ?>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $category_count;?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!--         <div class="row">
            
        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          <?php
            // $element_text = ['Active Post','comments','users','categories'];
            // $element_count = [$query_count,$comment_count,$users_count,$category_count ];
            // for($i=0;$i<4;$i++){
            //     echo"['{$element_text[$i]}',"."{$element_count[$i]}],";
            // }

          
          ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

        </div> -->



    </div>
    <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>

</body>

</html>
