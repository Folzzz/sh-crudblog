<?php
    //import database config file
    require_once('config/config.php');

    //check form submit
    if(isset($_POST['submit'])) {
        // get form data
        $update_id = mysqli_real_escape_string($db_conn, $_POST['update_id']);
		$title = mysqli_real_escape_string($db_conn, $_POST['title']);
		$author = mysqli_real_escape_string($db_conn, $_POST['author']);
		$body = mysqli_real_escape_string($db_conn, $_POST['body']);

        //query
        $query = "UPDATE posts SET 
                    title = '$title', author = '$author', body = '$body' 
                    WHERE id = {$update_id}";

        //if successful redirect to home page
        if(mysqli_query($db_conn, $query)) {
            header("Location: ".ROOT_URL."");
        } else {
            echo "ERROR: ".mysqli_error($db_conn);
        }
    }

    //get id for individual post
    $id = mysqli_real_escape_string($db_conn, $_GET['id']);

    //create query
    $query = "SELECT * FROM posts WHERE id = {$id}";
    //get response
    $response = @mysqli_query($db_conn, $query);

    //fecth post from response
    $post = @mysqli_fetch_assoc($response);

    // free response from memory
    mysqli_free_result($response);
    //close connection
    mysqli_close($db_conn);

?>

<!-- html -->
<?php include_once('inc/header.php'); ?>

    <div class="container p-4">
        <h1 class="text-primary my-4">Edit Blog Posts </h1>

        <form action="<?= $_SERVER['PHP_SELF'];?>"  method="POST">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?=$post['title']; ?>" required>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="<?=$post['author'];?>"  required>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control" required><?=$post['body'];?></textarea>
            </div>

            <input type="hidden" name="update_id" value="<?=$post['id'];?>">
            <input type="submit" name="submit" value="submit" class="btn btn-primary">

        </form>
    </div>


<?php include_once('inc/footer.php') ?>