<?php
if(isset($_POST['submit'])){
    $select_option = $_POST['select_option'];
    forEach($_POST['CheckboxArray'] as  $checkbox){
       if($select_option == 'Delete'){
        $query = "DELETE FROM posts WHERE post_id = {$checkbox}";
        $results = mysqli_query($conn,$query);
       } else if ($select_option == 'varified'){
        $query_draft = "UPDATE posts SET post_status = 'varified' WHERE post_id ='{$checkbox}'";
        $query_results = mysqli_query($conn,$query_draft);
       } else if($select_option == 'draft'){
        $query_varified = "UPDATE posts SET post_status = 'draft' WHERE post_id ='{$checkbox}'";
        $query_result = mysqli_query($conn,$query_varified);
       } else {
        header("Location: posts.php");
       }
    }
}
?>
<?php include 'delete_modal.php';?>
<form method="POST" action="">
    <div class="table-responsive">
 <table class="table table-bordered table-hover">
    <div id="bulkcontentcontainer" class="col-xs-4">
        <select class="form-control" name="select_option" id="">
            <option value="">Select Options</option>
            <option value="varified">Varified</option>
            <option value="draft">Draft</option>
            <option value="Delete">Delete</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_posts">Add New</a>
    </div>
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM posts ORDER BY post_id DESC";
            $post_result = mysqli_query($conn, $query);
            if(!$post_result){
                die("failed to execute properly");
            }
            while ($rows = mysqli_fetch_assoc($post_result)) {
                $post_id = $rows['post_id'];
                $post_author = $rows['post_author'];
                $post_title = $rows['post_title'];
                $post_cat_id = $rows['post_cat_id'];
                $post_status = $rows['post_status'];
                $post_image = $rows['post_image'];
                $post_tags = $rows['post_tags'];
                $post_comments = $rows['post_comments'];
                $post_date = $rows['post_date'];

                
                echo " <tr>";
                ?>
                <td><input type="checkbox" class="checkboxes" name="CheckboxArray[]" value="<?php echo $post_id;?>"></td>
                <?php
                echo "<td>{$post_id}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_title}</td>";

                $select_query = "SELECT * FROM category WHERE cat_id='$post_cat_id' ORDER BY cat_id";
                $select_results = mysqli_query($conn,$select_query);
                while ($row = mysqli_fetch_assoc($select_results)) {
                    $row_id = $row['cat_id'];
                    $row_title = $row['cat_title'];
                    echo "<td>{$row_title}</td>";
                }
                echo "<td>{$post_status}</td>";
                echo "<td><img width ='100' src='../images/{$post_image}' alt='image'></td>";
                echo "<td>{$post_tags}</td>";
                echo "<td>{$post_comments}</td>";
                echo "<td>{$post_date}</td>";
                echo "<td><a rel='{$post_id}' href='javascript:void(0)' class='post_delete'>Delete</a></td>";
                // echo "<td><a onClick =\" javascript: return confirm('Are You Sure You Want To Delete This Post?');\" href='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "<td><a href='posts.php?source=edit_posts&p_id={$post_id}'>Edit</a></td>";
            echo "</tr>";
            }
        ?>
       
    </tbody>
</table>
    </div>
</form>
<?php
if(isset($_GET['delete'])) {
$post_id = $_GET['delete'];
$delete_query = "DELETE FROM posts WHERE post_id = {$post_id}";
$delete_results = mysqli_query($conn,$delete_query);
header("Location: posts.php");
}
?>

<script type="text/javascript">
    $(document).ready(function(){
        $('.post_delete').on('click',function(){
            let id = $(this).attr("rel");
            const delete_url = "posts.php?delete="+id+"";
            $('.confirm_delete').attr('href',delete_url);
            $('#myModal').modal('show');
        });
    });
</script>