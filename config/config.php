<?php
    //local development
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_USER', 'root');
    DEFINE('DB_PASSWORD', 'freshpeter498');
    DEFINE('DB_NAME', 'sidehustleblog');

    DEFINE('ROOT_URL', 'http://localhost/phpsandbox/sidehustle-tasks/level4-crudblog/');

    //REMOTE DB
    // DEFINE('DB_HOST', '');
    // DEFINE('DB_USER', '');
    // DEFINE('DB_PASSWORD', '');
    // DEFINE('DB_NAME', '');

    // DEFINE('ROOT_URL', '');

    //create connection to database
    $db_conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Couldn\'t connect to database '. mysqli_connect_error());
?>