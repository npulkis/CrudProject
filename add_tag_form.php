<?php
include('includes/header.php');
?>
<!-- the head section -->
<div class="container">


    <div class="container">


        <form action="add_tag.php" method="post" enctype="multipart/form-data"
              id="add_tag_form">

            <div class="mb-3">
                <label for="tag" class="form-label">Enter Tag Name</label>
                <input type="text" name="tag" class="form-control" id="title" aria-describedby="inputGroupFileAddon04">
            </div>

            <button type="submit" class="btn btn-sm btn-primary" role="button">Save</button>
        </form>


    </div>
