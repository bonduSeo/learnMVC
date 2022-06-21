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

    public function selBoard($param)
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

    public function delBoard($param)
    {
        $sql =
            "  DELETE FROM t_board
                where i_board = :i_board
            ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':i_board', $param["i_board"]);
        $stmt->execute();
    }
}
