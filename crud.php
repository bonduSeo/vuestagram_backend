<?php
include_once "db/db_feed.php";
$method = $_SERVER['REQUEST_METHOD'];

print $method;
print "<br>";
// print $_SERVER['PATH_INFO'];

switch ($method) {
    case 'GET':
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $result = insBoard($data);
        // print $result;
        print $data;
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
}
