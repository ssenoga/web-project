 <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM users";
            $user_result = mysqli_query($conn, $query);
            if(!$user_result){
                die("failed to execute properly");
            }
            while ($rows = mysqli_fetch_assoc($user_result)) {
                $user_id = $rows['user_id'];
                $username = $rows['username'];
                $user_firstname = $rows['user_firstname'];
                $user_lastname = $rows['user_lastname'];
                $user_password = $rows['user_password'];
                $user_email = $rows['user_email'];
                $user_image = $rows['user_image'];
                $user_role = $rows['user_role'];

                
                echo " <tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$username}</td>";
                echo "<td>{$user_firstname}</td>";

                // $select_query = "SELECT * FROM category WHERE cat_id='$post_cat_id'";
                // $select_results = mysqli_query($conn,$select_query);
                // while ($row = mysqli_fetch_assoc($select_results)) {
                //     $row_id = $row['cat_id'];
                //     $row_title = $row['cat_title'];
                //     echo "<td>{$row_title}</td>";
                // }
                echo "<td>{$user_lastname}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$user_role}</td>";
                // $query = "SELECT * FROM users WHERE post_id = $comment_post_id";
                // $comm_result = mysqli_query($conn,$query);
                // while($rows = mysqli_fetch_assoc($comm_result)){
                //     $the_post_id = $rows['post_id'];
                //     $post_title = $rows['post_title'];
                //     echo "<td><a href = '../post.php?p_id=$the_post_id'>$post_title</a></td>";
                // }
                echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
                echo "<td><a href='users.php?change_to_subscriber=$user_id'>Subscriber</a></td>";
                echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                echo "<td><a href='users.php?source=edit_users&edit_user=$user_id'>Edit</a></td>";
            echo "</tr>";
            }
        ?>
       
    </tbody>
</table>

<?php
if(isset($_GET['change_to_admin'])){
    $change_to_admin_id = $_GET['change_to_admin'];
    $change_to_admin = "UPDATE users SET user_role = 'Admin' WHERE user_id = $change_to_admin_id";
    $to_admin_results = mysqli_query($conn,$change_to_admin);
    header("Location: ./users.php");
}
// approving the comment status
if(isset($_GET['change_to_subscriber'])){
    $change_to_subscriber_id = $_GET['change_to_subscriber'];
    $change_to_subscriber_query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $change_to_subscriber_id";
    $change_results = mysqli_query($conn,$change_to_subscriber_query);
    header("Location: ./users.php");
}



if(isset($_GET['delete'])){
    $del_user_id = $_GET['delete'];
    $delete_user_query = "DELETE FROM users WHERE user_id = $del_user_id";
    $query_user_results = mysqli_query($conn,$delete_user_query);
    header("Location: ./users.php");
}
?>