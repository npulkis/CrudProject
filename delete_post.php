<?php
require_once('database.php');

// Get IDs
$post_id =$_GET['id'];
// Delete the product from the database
    $query = "DELETE FROM posts
              WHERE postID = '$post_id'";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();

// redirect to  the Post List page
echo("<script>window.location.replace('index.php');</script>");
?>