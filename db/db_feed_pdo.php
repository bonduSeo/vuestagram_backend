<?php
include_once "db/db_pdo.php";

class ApiModel extends Model
{
    public function getBoardPDO()
    {
        $sql =
            "   SELECT * FROM feed
            ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
