<?php
require('database.php');

$post_id = filter_input(INPUT_POST, 'post_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM posts
          WHERE postID = :post_id';
$statement = $db->prepare($query);
$statement->bindValue(':post_id', $post_id);
$statement->execute();
$posts = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();

$query = 'SELECT * FROM tags ORDER BY tagID';
$statement = $db->prepare($query);
$statement->execute();
$tags = $statement->fetchAll();
$statement->closeCursor();
?>
    <!-- the head section -->

<?php
include('includes/header.php');
?>
<div class="container">

    <form action="edit_post.php" method="post" enctype="multipart/form-data"
    id="edit_record_form">
        <input type="hidden" name="original_image" value="<?php echo $posts['image']; ?>" />
        <input type="hidden" name="post_id"
               value="<?php echo $posts['postID']; ?>">
        <input type="hidden" name="likes"
               value="<?php echo $posts['likes']; ?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Edit Tag Id</label>
            <input type="text" class="form-control" id="tagID" name="tag_id" placeholder="Enter Tag ID" value="<?php echo $posts['tagID'];?>">


        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Edit Caption</label>
            <textarea class="form-control" id="caption" name="caption" rows="5" ><?php echo $posts['caption'];?></textarea>
        </div>

        <div class="mb-3">
            <input type="file" name="image" class="form-control" id="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <?php if ($posts['image'] != "") { ?>
                <p><img src="./image_uploads/<?php echo $posts['image']; ?>" height="150" /></p>
            <?php } ?>
        </div>
        <button type="submit" class="btn btn-sm btn-primary" role="button">Save Changes</button>
    </form>


</div>