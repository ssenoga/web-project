
<form method="POST" action="">
    <div class="form-group">
        <label for = "cat_title">Edit Category</label>
        <?php
            if (isset($_GET['edit'])) {
                $cate_id = $_GET['edit'];
                $select_query = "SELECT * FROM category WHERE cat_id='$cate_id'";
                $select_result = mysqli_query($conn,$select_query);
                while ($row = mysqli_fetch_assoc($select_result)) {
                    $row_id = $row['cat_id'];
                    $row_title = $row['cat_title'];
                }?>
             <input type="text" name="cat_title" class="form-control" value="<?php if(isset($row_title)) echo $row_title;?>">     
            <?php }
        ?>
        <?php
            if(isset($_POST['update_cat'])) {
                $cat_title = $_POST['cat_title'];
                $delete_query = "UPDATE category SET cat_title='{$cat_title}' WHERE cat_id = {$cat_id}";
                $update_results = mysqli_query($conn,$delete_query);
                if (!$update_results) {
                    die("query failed ".mysqli_error($conn));
                } {
                    header("Location: ../admin/categories.php");
                }
            }
        ?>

      
    </div>
    <div class="form-group">
        <input type="submit" name="update_cat" class="btn btn-warning" value="Update">
    </div>
</form>