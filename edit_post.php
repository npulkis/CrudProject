<?php

// Get the record data
$post_id = filter_input(INPUT_POST, 'post_id', FILTER_VALIDATE_INT);
$tag_id = filter_input(INPUT_POST, 'tag_id', FILTER_VALIDATE_INT);
$caption = filter_input(INPUT_POST, 'caption');
$likes = filter_input(INPUT_POST, 'likes', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($post_id == NULL) {
    $error = "Invalid record data. Check all fields and try again.";
    include('error.php');
} else {

    /**************************** Image upload ****************************/

    $imgFile = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
    $original_image = filter_input(INPUT_POST, 'original_image');

    if ($imgFile) {
        $upload_dir = 'image_uploads/'; // upload directory
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $image = rand(1000, 1000000) . "." . $imgExt;
        if (in_array($imgExt, $valid_extensions)) {
            if ($imgSize < 5000000) {
                if (filter_input(INPUT_POST, 'original_image') !== "") {
                    unlink($upload_dir . $original_image);
                }
                move_uploaded_file($tmp_dir, $upload_dir . $image);
            } else {
                $errMSG = "Sorry, your file is too large it should be less then 5MB";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
// if no image selected the old image remain as it is.
        $image = $original_image; // old image from database
    }

    /************************** End Image upload **************************/

// If valid, update the record in the database
    require_once('database.php');

    $query = 'UPDATE posts
SET tagID = :tag_id,
caption = :caption,
likes = :likes,
image = :image
WHERE postID = :post_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':tag_id', $tag_id);
    $statement->bindValue(':caption', $caption);
    $statement->bindValue(':likes', $likes);
    $statement->bindValue(':image', $image);
    $statement->bindValue(':post_id', $post_id);
    $statement->execute();
    $statement->closeCursor();

// Display the post List page

    echo("<script>window.location.replace('index.php');</script>");
}
?>