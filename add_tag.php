<?php

// Get the product data
$tagName = filter_input(INPUT_POST, 'tag');

// Validate inputs


require_once('database.php');

// Add the product to the database
$query = "INSERT INTO tags
                 (tagName)
              VALUES
                 (:tagName)";
$statement = $db->prepare($query);
$statement->bindValue(':tagName', $tagName);

$statement->execute();
$statement->closeCursor();

// Display the Product List page

echo("<script>window.location.replace('index.php');</script>");

//}