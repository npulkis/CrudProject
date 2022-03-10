<?php
require_once('database.php');

// Get IDs
$tag_id =$_GET['id'];
// Delete the product from the database
$query = "DELETE FROM tags
              WHERE tagID = '$tag_id'";
$statement = $db->prepare($query);
$statement->execute();
$statement->closeCursor();

// redirect to  the Post List page
echo("<script>window.location.replace('tag_list.php');</script>");
?>