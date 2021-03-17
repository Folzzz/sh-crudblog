<?php

    //import database config file
    require_once('config/config.php');

    //check for submit
    if(isset($_POST['submit'])) {
        // get form data details
        $title = mysqli_real_escape_string($db_conn, $_POST['title']);
        $author = mysqli_real_escape_string($db_conn, $_POST['author']);
        $body = mysqli_real_escape_string($db_conn, $_POST['body']);

        //create query to insert
        $query = "INSERT INTO posts(title, author, body) VALUES('$title', '$author', '$body')";

        //if successful redirect to home page
        if(mysqli_query($db_conn, $query)) {
            header("Location: ".ROOT_URL."");
        } else {
            echo "ERROR: ".mysqli_error($db_conn);
        }
    }
?>

<!-- html -->
<?php include_once('inc/header.php'); ?>

    <div class="container p-4">
        <h1 class="text-primary my-4"> Blog Posts </h1>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control" required></textarea>
            </div>

            <input type="submit" name="submit" value="submit" class="btn btn-primary">

        </form>
    </div>

<?php include_once('inc/footer.php') ?>