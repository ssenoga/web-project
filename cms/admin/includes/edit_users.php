<?php
if(isset($_GET['edit_user'])){
    $the_user_id = $_GET['edit_user'];

    $edit_user_query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
   $edit_results = mysqli_query($conn,$edit_user_query);
   while($rows = mysqli_fetch_assoc($edit_results)){
    $username = $rows['username'];
    $user_firstname = $rows['user_firstname'];
    $user_lastname = $rows['user_lastname'];
    $user_role = $rows['user_role'];
    $user_email = $rows['user_email'];
    $user_password = $rows['user_password'];
   }
   connection_check($edit_results);
}



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

    $query = "SELECT randsalt FROM users";
    $query_results = mysqli_query($conn,$query);
    if(!$query_results){
        die("QUERY FAILED ".mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($query_results);
    $randsalt = $row['randsalt'];
    $password = crypt($user_password,$randsalt);

    $query_update = "UPDATE users SET username ='{$username}', ";
    $query_update .= "user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', ";
    $query_update .= "user_password='{$password}', ";
    $query_update .= "user_email = '{$user_email}', user_role ='{$user_role}' ";
    $query_update .= "WHERE user_id = {$the_user_id}";

    $user_update = mysqli_query($conn,$query_update);
    connection_check($user_update);
  
}
?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="user_firstname">Firstname</label>
    <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname?>">
</div>
<div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname?>">
</div>
<div class="form-group">
    <label for="user_role">Role</label>
    <select name="user_role" class="form-control">
        <option value="<?php echo $user_role;?>"><?php echo $user_role;?></option>
        <?php
            if($user_role == 'Admin'){
                echo "<option value='subscriber'>Subscriber</option>";
            } else {
                echo "<option value='admin'>Admin</option>";
            }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" name="user_email" class="form-control" value="<?php echo $user_email?>">
</div>
<div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" name="user_password" class="form-control" value="<?php echo $user_password;?>">
</div>
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" value="<?php echo $username?>">
</div>
<!-- <div class="form-group">
    <label for="user_image">Profile picture</label>
    <input type="file" name="user_image" class="form-control">
</div -->
<div class="form-group">
    <input type="submit" name="user_submit" value="Update" class="btn btn-primary" >
</div>
</form>