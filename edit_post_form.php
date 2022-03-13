<?php
require('database.php');

$post_id = $_GET['id'];
$query = "SELECT *
          FROM posts
          WHERE postID = '$post_id'";
$statement = $db->prepare($query);
$statement->execute();
$posts = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();


$query2 = 'SELECT * FROM tags ORDER BY tagID';
$statement2 = $db->prepare($query2);
$statement2->execute();
$tags = $statement2->fetchAll();
$statement2->closeCursor();

?>
    <!-- the head section -->

<?php
include('includes/header.php');
?>
<div class="container">

    <h3>Edit Post</h3>

    <div class="form">
    <form action="edit_post.php" method="post" enctype="multipart/form-data"
    id="edit_record_form">
        <input type="hidden" name="original_image" value="<?php echo $posts['image']; ?>" />
        <input type="hidden" name="post_id"
               value="<?php echo $posts['postID']; ?>">
        <input type="hidden" name="likes"
               value="<?php echo $posts['likes']; ?>">



        <div class="mb-3">
            <label for="tag_id" class="form-label">Edit Tag</label>
            <select name="tag_id" class="form-select" aria-label="Select Tag" required>
                <?php foreach ($tags as $tag) : ?>
                    <option value="<?php echo $tag['tagID']; ?>">
                        <?php echo $tag['tagName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Edit Title"value="<?php echo $posts['title'];?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Edit Caption</label>
            <textarea class="form-control" id="caption" name="caption" rows="5" required><?php echo $posts['caption'];?></textarea>
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


</div>