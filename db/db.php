<?php
define("URL", "127.0.0.1");
define("USERNAME", "root");
define("PASSWORD", "root");
define("DB_NAME", "vuestagram");
define("PORT", "3306");

function get_conn()
{
    return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME, PORT);
}
