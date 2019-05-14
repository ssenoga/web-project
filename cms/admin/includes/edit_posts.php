<?php
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE post_id={$the_post_id}";
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
    $post_content = $rows['post_content'];
}
if(isset($_POST['submit_update'])){

$post_title = $_POST['post_title'];
$post_author = $_POST['post_author'];
$post_cat_id = $_POST['post_cat_id'];
$post_date = $_POST['post_date'];
$post_image = $_FILES['post_image']['name'];
$post_image_temp = $_FILES['post_image']['tmp_name'];
$post_content = $_POST['post_content'];
$post_tags = $_POST['post_tags'];
$post_comment = $_POST['post_comment'];
$post_status = $_POST['post_status'];
// moving the image to our images folder
move_uploaded_file($post_image_temp , "../images/$post_image");
// checking if the pic is empty
if(empty($post_image)) {
    $sql = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
    $query = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $post_image = $row['post_image'];
    }
}

$query_update = "UPDATE posts SET post_title ='{$post_title}', ";
$query_update .= "post_cat_id='{$post_cat_id}', post_author='{$post_author}', ";
$query_update .= "post_date = now(), post_image = '{$post_image}', post_content='{$post_content}', ";
$query_update .= "post_tags = '{$post_tags}', post_comments ='{$post_comment}', post_status='{$post_status}' ";
$query_update .= "WHERE post_id = {$the_post_id}";

$sql = mysqli_query($conn,$query_update);
connection_check($sql);

echo "<p>Post Updated: <a href='../post.php?p_id={$the_post_id}'>View Post</a> OR <a href='posts.php'>Update More Posts</a></p>";

}

?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" name="post_title" class="form-control" value="<?php echo $post_title;?>">
</div>
<div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" name="post_author" class="form-control" value="<?php echo $post_author;?>">
</div>
<div class="form-group">
    <label for="post_cat_id">Post Category Id</label>
    <select name="post_cat_id" class="form-control">
        <?php
        $select_query_select = "SELECT * FROM category";
        $select_result_select = mysqli_query($conn,$select_query_select);
        connection_check($select_result_select);
        while ($row = mysqli_fetch_assoc($select_result_select)) {
            $row_id = $row['cat_id'];
            $row_title = $row['cat_title'];

            echo "<option value='{$row_id}'>{$row_title}</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="post_date">Post Date</label>
    <input type="date" name="post_date" class="form-control" value="<?php echo $post_date;?>">
</div>
<div class="form-group">
    <label for="post_image">Post Image</label>
    <img  width='100' src="../images/<?php echo $post_image;?>">
    <input type="file" name = "post_image" class="form-control">
</div>
<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea name="post_content" id="editor" class="form-control" cols='30' rows='10'><?php echo $post_content;?></textarea>
</div>
<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" name="post_tags" class="form-control" value="<?php echo $post_tags;?>">
</div>
<div class="form-group">
    <label for="post_comment">Post Comment</label>
    <input type="text" name="post_comment" class="form-control" value="<?php echo $post_comments;?>">
</div>
<div class="form-group">
    <label for="post_status">Post Status</label>
    <select class="form-control" name="post_status">
        <option value='<?php echo $post_status;?>'><?php echo $post_status;?></option>
        <?php
            if($post_status == 'Draft'){
                echo "<option value='varified'>Varified</option>";
            } else {
                echo "<option value='draft'>Draft</option>";
            }
        ?>
    </select>
</div>
<div class="form-group">
    <input type="submit" name="submit_update" value="Update Post" class="btn btn-primary" >
</div>
</form>
