<?php
include_once "db.php";

function insBoard(&$param)
{
    $name = $param["name"];
    $userImage = $param["userImage"];
    $postImage = $param['postImage'];
    $content = $param['content'];
    $filter = $param['filter'];
    $sql =
        "   INSERT INTO feed
            (name, userImage, postImage, content, filter)
            VALUES
            ('$name', '$userImage', '$postImage', '$content', '$filter')
    ";
    $conn = get_conn();
    return mysqli_query($conn, $sql);
}

function getBoard()
{
    $sql =
        "   SELECT * FROM feed
        ";
    $conn = get_conn();
    return mysqli_query($conn, $sql);
}
