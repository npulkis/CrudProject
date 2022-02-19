<?php
require_once('database.php');

// Get IDs
$post_id = filter_input(INPUT_POST, 'post_id', FILTER_VALIDATE_INT);
$tag_id = filter_input(INPUT_POST, 'tag_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($post_id != false && $tag_id != false) {
    $query = "DELETE FROM posts
              WHERE postID = :post_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':post_id', $post_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('index.php');
?>