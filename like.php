<?php
require 'database.php';
global $db;


$id = $_GET['id'];
$updateLikeCount = "UPDATE posts SET likes = likes + 1 WHERE postID = '$id' ";
$statement1 = $db->prepare($updateLikeCount);
$statement1->execute();
$statement1->closeCursor();

echo("<script>window.location.replace('index.php');</script>");
