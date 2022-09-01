<?php
include_once "db/db_feed.php";
include_once "db/db_feed_pdo.php";
$method = $_SERVER['REQUEST_METHOD'];
$apiModel = new ApiModel();

// print $_SERVER['PATH_INFO'];

switch ($method) {
    case 'GET':
        $result =  $apiModel->getBoardPDO();

        $list = [];
        foreach ($result as $v) {
            $v->postImage = 'http://localhost/backend/' . $v->postImage;
            array_push($list, $v);
        }
        print json_encode($list);


        break;
    case 'POST':
        // $data = json_decode(file_get_contents('php://input'), true);
        $data = $_POST;
        $postImage = $_FILES['postImage'];

        if ($postImage['name']) {
            $imageFullName = strtolower($postImage['name']);
            $imageNameSlice = explode(".", $imageFullName);
            $imageName = $imageNameSlice[0];
            $imageType = $imageNameSlice[1];
            $image_ext = array('jpg', 'jpeg', 'gif', 'png');
            if (array_search($imageType, $image_ext) === false) {
                // errMsg('jpg, jpeg, gif, png 확장자만 가능합니다.');
                return;
            }
            $dates = date("mdhis", time());
            $newImage = chr(rand(97, 122)) . chr(rand(97, 122)) . $dates . rand(1, 9) . "." . $imageType;
            $dir = "feedImg/";
            move_uploaded_file($postImage['tmp_name'],  $dir . $newImage);
            chmod($dir . $newImage, 0777);
        }
        $data['postImage'] = $dir . $newImage;
        $result = insBoard($data);
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
}
