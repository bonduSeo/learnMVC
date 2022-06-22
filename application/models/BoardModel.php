<?php

namespace application\models;

use PDO;

class BoardModel extends Model
{
    public function selBoardList()
    {
        $sql =
            "   SELECT i_board,title,created_at
                FROM t_board
                ORDER BY i_board DESC
            ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function selBoard(&$param)
    {
        $sql =
            "   SELECT a.i_board, a.title, a.ctnt, a.created_at, b.nm 
                FROM t_board AS a 
                INNER JOIN t_user AS b 
                ON a.i_user = b.i_user
                WHERE i_board=:i_board
            ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function updBoard(&$param)
    {
        $sql =
            "   UPDATE t_board
                SET title = :title
                    , ctnt = :ctnt
                WHERE
                i_board = :i_board
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->bindValue(':title', $param["title"]);
        $stmt->bindValue(':ctnt', $param["ctnt"]);
        $stmt->execute();
    }

    public function delBoard(&$param)
    {
        $sql =
            "  DELETE FROM t_board
                where i_board = :i_board
            ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->execute();
    }
    public function insBoard(&$param)
    {
        $sql =
            "   INSERT INTO t_board
            (i_user, title, ctnt)
            VALUES
            (:i_user,:title, :ctnt)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':title', $param['title']);
        $stmt->bindValue(':ctnt', $param['ctnt']);
        $stmt->bindValue(':i_user', $_SESSION[_LOGINUSER]->i_user);
        $stmt->execute();
    }
}
