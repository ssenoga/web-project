<?php
if (isset($_POST['user_submit'])) {
    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    // $post_date = date('y-m-d');
    // $post_image = $_FILES['post_image']['name'];
    // $post_image_temp = $_FILES['post_image']['tmp_name'];
    $user_lastname = $_POST['user_lastname'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    // moving the image to our images folder
    // move_uploaded_file($post_image_temp , "../images/$post_image");
   $user_query = "INSERT INTO users(username,user_firstname,user_lastname,user_password,user_email,user_role) VALUES('{$username}','{$user_firstname}','{$user_lastname}','{$user_password}','{$user_email}','{$user_role}')";
   $user_query_results = mysqli_query($conn,$user_query);
   connection_check($user_query_results);

   echo "New User Account Created :". "<a href='users.php'>View Users</a>";
}
?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="user_firstname">Firstname</label>
    <input type="text" name="user_firstname" class="form-control">
</div>
<div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" name="user_lastname" class="form-control">
</div>
<div class="form-group">
    <label for="user_role">Role</label>
    <select name="user_role" class="form-control">
         <option value="subscriber">Select Category</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
        <?php
        // $select_query = "SELECT * FROM users";
        // $select_result = mysqli_query($conn,$select_query);
        // connection_check($select_result);
        // while ($row = mysqli_fetch_assoc($select_result)) {
        //     $user_id = $row['user_id'];
        //     $user_role = $row['user_role'];
        //     echo "<option value='{$user_id}'>{$user_role}</option>";
        // }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" name="user_email" class="form-control">
</div>
<div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" name="user_password" class="form-control">
</div>
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control">
</div>
<!-- <div class="form-group">
    <label for="user_image">Profile picture</label>
    <input type="file" name="user_image" class="form-control">
</div -->
<div class="form-group">
    <input type="submit" name="user_submit" value="Add New User" class="btn btn-primary" >
</div>
</form>