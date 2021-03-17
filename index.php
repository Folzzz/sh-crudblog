<?php
    //import database config file
    require_once('config/config.php');

    //fetch posts from db

    //create query
    $query = "SELECT * FROM posts ORDER BY created_at DESC";

    //STORE RESPONSE FROM QUERY
    $response = @mysqli_query($db_conn, $query);

    //confirm query executes properly
    if($response) {
        //fetch data from response
        $posts = @mysqli_fetch_all($response, MYSQLI_ASSOC);
        // print_r($posts);

        // free response from memory
        mysqli_free_result($response);
    } else {
        echo "Couldn't issue database query <br/>";
        echo mysqli_error($db_conn);
    }


    // DELETE POST CHECK
    if(isset($_POST['delete'])) {
        //get form data
        $delete_id = mysqli_real_escape_string($db_conn, $_POST['delete_id']);

        // delete the selected query
        $query = "DELETE FROM posts WHERE id ={$delete_id}";

        // run through query and redirect to root_url
        if(mysqli_query($db_conn, $query)) {
            header("Location: ".ROOT_URL."");
        } else {
            echo "ERROR: ".mysqli_error($db_conn);
        }
    }
    // end of delete post

    //close database connection
    mysqli_close($db_conn);

?>

<!-- html -->
<?php include_once('inc/header.php'); ?>
    <div class="container p-4">

        <h1 class="text-primary my-4"> Blog Posts </h1>
        <?php foreach($posts as $post): ?>
            <div class="well shadow p-3 mb-5 bg-white rounded">
                <h3 class="text-primary"> <?=$post['title'];?> </h3>
                <small>Created on <?=$post['created_at'];?> by <?=$post['author'];?> </small>
                <p class="mt-4"> <?=$post['body'];?> </p>

                <!-- edit and delete post -->
                <hr>
                <form class="float-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
                <a class="btn btn-primary" href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>">Edit</a>
            </div>
        <?php endforeach; ?>
    </div>

<?php include_once('inc/footer.php') ?>