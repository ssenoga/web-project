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
                    <div class="col-xs-6">
                        <?php insertCategory(); ?>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for = "cat_title">Add Category</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                        <?php
                            if (isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                                include 'includes/update_category.php';
                            }
                        ?>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    select_all_cat();
                                ?>
                                <?php
                                  delete_cat();
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->

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

</body>

</html>
