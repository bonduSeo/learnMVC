<?php

namespace application\controllers;

use application\models\BoardModel;

class BoardController extends Controller
{
    public function list()
    {
        $model = new BoardModel();

        $this->addAttribute("title", "리스트");

        // $this->list = $model->selBoardList();
        $this->addAttribute("list", $model->selBoardList());

        $this->addAttribute("js", ['board/list']);

        return "board/list.php";
        //view 파일명
    }
    public function detail()
    {
        $this->addAttribute("js", ['board/detail']);
        $i_board = $_GET['iboard'];
        // print "i_board : {$i_board}<br>";
        $model = new BoardModel();
        $param = ["i_board" => $i_board];
        $this->addAttribute("data", $model->selBoard($param));
        return "board/detail.php";
    }
    public function del()
    {
        $param = ['i_board' => $_GET['i_board']];
        $model = new BoardModel();
        $model->delBoard($param);
        return "board/del.php";
    }
}
