<?php
define('_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('_DBTYPE', 'mysql'); //mysql, mariadb 등
define('_DBHOST', '127.0.0.1'); //DB접속 주소
define('_DBNAME', 'vuestagram'); //DB명
define('_DBUSER', 'root'); //아이디
define('_DBPASSWORD', 'root'); //비번
define('_CHARSET', 'utf8');


use Exception;
use PDO;

class Model
{
    public function __construct()
    {
        $dsn = _DBTYPE . ':host=' . _DBHOST . ';dbname=' . _DBNAME . ';charset=' . _CHARSET;
        try {
            $this->pdo = new PDO($dsn, _DBUSER, _DBPASSWORD);

            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            var_dump("DB 접속 중 에러가 발생하였습니다. :::: " . $e->getMessage());
        }
    }
}
