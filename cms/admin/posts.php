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
                            <small>ssenoga</small>
                        </h1>
                       <?php
                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }
                        switch ($source) {
                            case 'add_posts':
                                include 'includes/add_posts.php';
                                break;
                            case 'edit_posts':
                                include 'includes/edit_posts.php';
                                break;
                            default:
                            include 'includes/view_all_posts.php';
                             break;
                        }
                       ?>
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
    <script src="js/scripts.js"></script>

</body>

</html>
