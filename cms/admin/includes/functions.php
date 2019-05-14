<?php
// inserting function
function connection_check($result){
  global $conn;
  if(!$result){
    die("Failed to execute ".mysqli_error($conn));
  }
}

function insertCategory() {
	global $conn;
	if(isset($_POST['submit'])){
       $cat_title = $_POST['cat_title'];
       if(empty($cat_title)){
        echo "This field must not be empty";
       }else{
           $select_query = "SELECT * FROM category WHERE cat_title='$cat_title'";
           $select_result = mysqli_query($conn,$select_query);
           $add_count = mysqli_num_rows($select_result);
           if($add_count == 0){
                $add_query = "INSERT INTO category(cat_title) VALUES('$cat_title')";
                $add_result = mysqli_query($conn,$add_query);
           } else {
            echo "The {$cat_title} category already exists";
           }
       }
    }
}

function select_all_cat(){
	global $conn;
	$query = "SELECT * FROM category ORDER BY cat_id ";
    $cat_result = mysqli_query($conn, $query);
    if(!$cat_result){
        die("failed to execute properly");
    }
    while ($rows = mysqli_fetch_assoc($cat_result)) {
        $row_id = $rows['cat_id'];
        $row_title = $rows['cat_title'];
        ?>
         <tr>
            <td><?php echo $row_id;?></td>
            <td><?php echo $row_title;?></td>
            <td><?php echo "<a href='categories.php?delete={$row_id}''>Delete</a>";?></td>
            <td><?php echo "<a href='categories.php?edit={$row_id}''>Edit</a>";?></td>
        </tr>
    <?php } ?>
<?php }

function delete_cat(){
	global $conn;
  if(isset($_GET['delete'])) {
    $v_id = $_GET['delete'];
    $delete_query = "DELETE FROM category WHERE cat_id = {$v_id}";
    $delete_results = mysqli_query($conn,$delete_query);
    header("Location: categories.php");
    }
}

?>