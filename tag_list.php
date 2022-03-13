<?php
require 'database.php';
global $db;

$queryRecords = "SELECT * FROM tags ORDER BY tagID";
$statement1 = $db->prepare($queryRecords);
$statement1->execute();
$tags = $statement1->fetchAll();
$statement1->closeCursor();

include('includes/header.php')
?>

<div class="container">
    <h3>List of all Tags</h3>
<div class="form">


    <table class="table table-light">
        <thead>
        <th scope="col">ID</th>
        <th scope="col">Tag Name</th>
        <th scope="col">Delete</th>
        </thead>
        <tbody>
        <?php
        foreach ($tags as $tag){

            echo'
               

               <tr>
                <th scope="row">'.$tag['tagID'].'</th>
                <td>'.$tag['tagName'].'</td>
                <td><a href="delete_tag.php?id='.$tag['tagID'].'"><button class="btn btn-danger">Delete</button></a></td>      
               </tr>       
            ';
        }

        ?>
        </tbody>
    </table>
</div>



</div>