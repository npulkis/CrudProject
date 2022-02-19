<?php
require('database.php');
$query = 'SELECT * FROM tags ORDER BY tagID';
$statement = $db->prepare($query);
$statement->execute();
$tags = $statement->fetchAll();
$statement->closeCursor();
echo implode($tags);
?>
    <!-- the head section -->
    <div class="container">
<?php
include('includes/header.php');
?>

        <div class="container">



            <form action="add_post.php" method="post" enctype="multipart/form-data"
                  id="add_record_form">
                <input type="hidden" name="likes" value="0">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tag</label>
                    <input type="text" class="form-control" id="tagID" name="tag_id" placeholder="Enter Tag ID">
<!--                    <select name="tag_id" class="form-select" aria-label="Select Tag">-->
<!--                        --><?php //foreach ($tags as $tag) : ?>
<!--                            <option value="--><?php //echo $tag['tagID']; ?><!--">-->
<!--                                --><?php //echo $tags['tagID']; ?>
<!--                            </option>-->
<!--                        --><?php //endforeach; ?>
<!--                    </select>-->
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Edit Caption</label>
                    <textarea class="form-control" id="caption" name="caption" rows="5" ></textarea>
                </div>

                <div class="mb-3">
                    <input type="file" name="image" class="form-control" id="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
                <button type="submit" class="btn btn-sm btn-primary" role="button">Save Changes</button>
            </form>


        </div>