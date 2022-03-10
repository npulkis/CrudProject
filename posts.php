<?php
require 'database.php';
global $db;



    if (isset($_GET['id']))
    {
        $id =$_GET['id'];
    }else{
        $id = null;
    }


    if ($id == null){

        $queryRecords = "SELECT * FROM posts ORDER BY postID";
        $statement1 = $db->prepare($queryRecords);
        $statement1->execute();
        $posts = $statement1->fetchAll();
        $statement1->closeCursor();

        $tagName = "All Posts";


    }else{

        $queryRecords = "SELECT * FROM posts WHERE tagID = '$id'ORDER BY postID";
        $statement1 = $db->prepare($queryRecords);
        $statement1->execute();
        $posts = $statement1->fetchAll();
        $statement1->closeCursor();

        $queryTagName = "SELECT  tagName FROM tags WHERE tagID = '$id' limit 1";
        $statement2 = $db->prepare($queryTagName);
        $statement2->execute();
        $tagNames = $statement2->fetchAll();
        $statement2->closeCursor();

       foreach($tagNames as $name){

               $tagName =  $name['tagName'];
       }


    }

    $queryTags = "SELECT * FROM tags ORDER BY tagID";
    $statement3 = $db->prepare($queryTags);
    $statement3->execute();
    $tags = $statement3->fetchAll();
    $statement3->closeCursor();




    if(isset($_POST["tag"])){
    $tag=$_POST["tag"];

        if ($tag == 0){
            echo("<script>window.location.replace('index.php');</script>");
        }else{
            echo("<script>window.location.replace('index.php?id=$tag');</script>");
        }



//        echo "select tag is => ".$tag;
    }


    if($tags > 0){

        echo' <form method="POST" action="">
                <select name="tag" class="form-select form-select-lg mb-3" onchange="this.form.submit()">
                    <option disabled selected>Filter by tag</option>
                    <option value="0">All tags</option>';


      foreach ($tags as $tag){

          echo ' <option value="'.$tag['tagID'].'">'.$tag['tagName'].'</option>';
      }

      echo'  </select>
                </form>';
    }

    if($posts > 0){

        echo '<div class="col-12 pt-5"><h1>'.$tagName.'</h1></div>';


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

