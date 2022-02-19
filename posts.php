<?php
require 'database.php';


global $db;
    $queryRecords = "SELECT * FROM posts ORDER BY postID";
    $statement1 = $db->prepare($queryRecords);
    $statement1->execute();
    $posts = $statement1->fetchAll();
    $statement1->closeCursor();



    if($posts > 0){

        echo '<div class="col-12 pt-5"><h1>All Posts</h1></div>';


        foreach ($posts as $post):

            echo'
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="./image_uploads/'.$post['image'].' " alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">'. htmlspecialchars_decode(substr($post['caption'],0,255)) .'</p>
                    <div class="d-flex justify-content-between align-items-center">
                   <div class="btn-group">
                         <a href="post.php?id='.$post['postID'].'" class="btn btn-sm btn-outline-primary" role="button" aria-pressed="true">View</a>
                        <form action="edit_post_form.php" method="post" id="edit_post_form">
                             <input type="hidden" name="post_id" value="'.$post['postID'].'">
                            <input type="hidden" name="tag_id" value="'.$post['tagID'].'">
                            <button type="submit" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">Edit</button>
                        </form>
                         <form action="delete_post.php" method="post" id="delete_post">
                             <input type="hidden" name="post_id" value="'.$post['postID'].'">
                            <input type="hidden" name="tag_id" value="'.$post['tagID'].'">
                            <button type="submit" class="btn btn-sm btn-outline-danger" role="button" aria-pressed="true">Delete</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            ';

        endforeach;



    }

    else{
        echo "<h3>No posts added</h3>";
    }
