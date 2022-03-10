<?php
require('database.php');
global $db;

$id = $_GET['id'];
$queryRecords = "SELECT * FROM posts WHERE postID = '$id' ";
$statement1 = $db->prepare($queryRecords);
$statement1->execute();
$posts = $statement1->fetchAll();
$statement1->closeCursor();


foreach ($posts as $post){

    $caption = $post['caption'];
    $tagID = $post['tagID'];
    $likes = $post['likes'];
    $image = $post['image'];

    $date = date_create($post['date']);
    $datef = date_format($date,"d/m/y");

}

include ('./includes/header.php');


?>

    <div>
       <?php
       echo ' <img src="./image_uploads/' . $image . ' ">';
       ?>
    </div>

    <div>
        <h3><?php  echo $caption; ?></h3>
        <h5><?php  echo $likes; ?></h5>
        <h5><?php  echo $datef; ?></h5>
    </div>


<!---->
<!--                        <form action="edit_post_form.php" method="post" id="edit_post_form">-->
<!--                                <input type="hidden" name="post_id" value="' . $post['postID'] . '">-->
<!--                               <input type="hidden" name="tag_id" value="' . $post['tagID'] . '">-->
<!--                               <button type="submit" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Edit</button>-->
<!--                            </form>-->
<!--                         <form action="delete_post.php" method="post" id="delete_post">-->
<!--                          <input type="hidden" name="post_id" value="' . $post['postID'] . '">-->
<!--                                <input type="hidden" name="tag_id" value="' . $post['tagID'] . '">-->
<!--                         <button type="submit" class="btn btn-sm btn-outline-danger" role="button" aria-pressed="true">Delete</button>-->
<!--                     </form>-->