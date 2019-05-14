<div class="table-responsive">
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Content</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM comments ORDER BY comment_id DESC";
            $post_result = mysqli_query($conn, $query);
            if(!$post_result){
                die("failed to execute properly");
            }
            while ($rows = mysqli_fetch_assoc($post_result)) {
                $comment_id = $rows['comment_id'];
                $comment_post_id = $rows['comment_post_id'];
                $comment_content = $rows['comment_content'];
                $comment_author = $rows['cooment_author'];
                $comment_email = $rows['comment_email'];
                $comment_status = $rows['comment_status'];
                $comment_date = $rows['comment_date'];

                
                echo " <tr>";
                echo "<td>{$comment_id}</td>";
                echo "<td>{$comment_author}</td>";
                echo "<td>{$comment_content}</td>";

                // $select_query = "SELECT * FROM category WHERE cat_id='$post_cat_id'";
                // $select_results = mysqli_query($conn,$select_query);
                // while ($row = mysqli_fetch_assoc($select_results)) {
                //     $row_id = $row['cat_id'];
                //     $row_title = $row['cat_title'];
                //     echo "<td>{$row_title}</td>";
                // }
                echo "<td>{$comment_email}</td>";
                echo "<td>{$comment_status}</td>";

                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                $comm_result = mysqli_query($conn,$query);
                while($rows = mysqli_fetch_assoc($comm_result)){
                    $the_post_id = $rows['post_id'];
                    $post_title = $rows['post_title'];
                    echo "<td><a href = '../post.php?p_id=$the_post_id'>$post_title</a></td>";
                }
                
                echo "<td>{$comment_date}</td>";
               

                echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";

                echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
            echo "</tr>";
            }
        ?>
       
    </tbody>
</table>
</div>
<?php
if(isset($_GET['unapprove'])){
    $unapprove_id = $_GET['unapprove'];
    $unapprove_query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = $unapprove_id";
    $unapprove_results = mysqli_query($conn,$unapprove_query);
    header("Location: ./comments.php");
}
// approving the comment status
if(isset($_GET['approve'])){
    $approve_id = $_GET['approve'];
    $approve_query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $approve_id";
    $approve_results = mysqli_query($conn,$approve_query);
    header("Location: ./comments.php");
}



if(isset($_GET['delete'])){
    $del_id = $_GET['delete'];
    $delete_query = "DELETE FROM comments WHERE comment_id = $del_id";
    $query_results = mysqli_query($conn,$delete_query);
    header("Location: ./comments.php");
}
?>