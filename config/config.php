<?php
    //local development
    // DEFINE('DB_HOST', 'localhost');
    // DEFINE('DB_USER', 'root');
    // DEFINE('DB_PASSWORD', 'freshpeter498');
    // DEFINE('DB_NAME', 'sidehustleblog');

    // DEFINE('ROOT_URL', 'http://localhost/phpsandbox/sidehustle-tasks/level4-crudblog/');

    //REMOTE DB
    DEFINE('DB_HOST', 'remotemysql.com');
    DEFINE('DB_USER', 'EpmRN3W61d');
    DEFINE('DB_PASSWORD', 'nhHU7FWEeG');
    DEFINE('DB_NAME', 'EpmRN3W61d');

    DEFINE('ROOT_URL', 'https://sh-bloggers.herokuapp.com/');

    //create connection to database
    $db_conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Couldn\'t connect to database '. mysqli_connect_error());
?>