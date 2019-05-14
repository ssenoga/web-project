<?php
if (isset($_POST['submit'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_cat_id = $_POST['post_cat'];
    $post_date = date('y-m-d');
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    $post_comment = $_POST['Comment'];
    $post_status = $_POST['post_status'];
    // moving the image to our images folder
    move_uploaded_file($post_image_temp , "../images/$post_image");
    $query = "INSERT INTO posts(post_cat_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comments,post_status)";
    $query .="VALUES({$post_cat_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment}','{$post_status}')";
    $add_post_results = mysqli_query($conn,$query);
    connection_check($add_post_results);
    $the_post_id = mysqli_insert_id($conn);
    echo "<p>Post Created: <a href='../post.php?p_id={$the_post_id}'>View Post</a> OR <a href='posts.php'>Edit More Posts</a></p>";
}
?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" name="post_title" class="form-control">
</div>
<div class="form-group">
    <label for="post_author">Post Author</label>
    <select name="post_author" id="" class="form-control">
        <option value="">Select Author</option>
        <?php
            $select_query = "SELECT * FROM users";
            $select_results = mysqli_query($conn,$select_query);
            connection_check($select_results);
            while ($row = mysqli_fetch_assoc($select_results)) {
                $row_username = $row['username'];
                echo "<option value='{$row_username}'>{$row_username}</option>";
            }
        ?>
   </select>
</div>
<div class="form-group">
    <label for="post_cat">Post Category</label>
    <select name="post_cat" class="form-control">
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
    <input type="date" name="post_date" class="form-control">
</div>
<div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="post_image" class="form-control" value="Upload Pictures">
</div>
<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea name="post_content" id="editor" class="form-control" cols='30' rows='10'></textarea>
</div>
<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" name="post_tags" class="form-control">
</div>
<div class="form-group">
    <label for="post_comment">Post Comment</label>
    <input type="text" name="post_comment" class="form-control" value="0">
</div>
<div class="form-group">
    <label for="post_status">Post Status</label>
    <select class="form-control" name="post_status">
        <option value="draft">Draft</option>
        <option value="varified">Varified</option>
    </select>
</div>
<div class="form-group">
    <input type="submit" name="submit" value="Add New Post" class="btn btn-primary" >
</div>
</form>