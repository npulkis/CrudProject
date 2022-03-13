<?php
require('database.php');
$query = 'SELECT * FROM tags ORDER BY tagID';
$statement = $db->prepare($query);
$statement->execute();
$tags = $statement->fetchAll();
$statement->closeCursor();
?>

<?php
include('includes/header.php');
?>


    <div class="container">


        <div class="container">
            <h3>Add a Post</h3>

        <div class="form">

            <form action="add_post.php" method="post" enctype="multipart/form-data"
                  id="add_record_form">
                <input type="hidden" name="likes" value="0">
                <div class="mb-3">
                    <label for="tag_id" class="form-label">Tag</label>
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
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="inputGroupFileAddon04" required>
                </div>


                <div class="mb-3">
                    <label for="caption" class="form-label">Caption</label>
                    <textarea class="form-control" id="caption" name="caption" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <input type="file" name="image" class="form-control" id="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                </div>
                <button type="submit" class="btn btn-sm btn-primary" role="button">Save</button>
            </form>
        </div>

        </div>
