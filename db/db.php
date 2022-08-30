<?php
    define("URL", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "1234");
    define("DB_NAME", "vuestagram");
    define("PORT", "3306");

    function get_conn() 
    {
        return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME, PORT);
    }