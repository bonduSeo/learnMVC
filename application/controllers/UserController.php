<?php

namespace application\controllers;

use application\models\UserModel;

class UserController extends Controller
{
    public function join()
    {
        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("user/join.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
        return "template/t1.php";
    }

    public function joinProc()
    {
        $param = [
            "uid" => $_POST['uid'],
            "upw" => $_POST['upw'],
            "nm" => $_POST['nm'],
            "gender" => $_POST['gender']
        ];
        //비밀번호암호화
        $param["upw"] = password_hash($param["upw"], PASSWORD_BCRYPT);
        $model = new UserModel();
        $model->insUser($param);
        return "redirect:/user/join";
    }

    public function login()
    {
        $this->addAttribute(_TITLE, "로그인");
        $this->addAttribute(_HEADER, $this->getView("template/header.php"));
        $this->addAttribute(_MAIN, $this->getView("user/login.php"));
        $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
        return "template/t1.php";
    }

    public function loginProc()
    {
        $param = [
            "uid" => $_POST["uid"],
            "upw" => $_POST["upw"]
        ];
        $model = new UserModel();
        $dbUser = $model->selUser($param);
        // print_r($dbUser);

        if ($dbUser === false) {
            print "아이디없음";
            return $this->login();
        } else if (!password_verify($param["upw"], $dbUser->upw)) {
            print "비밀번호다름";
            return $this->login();
        }
        return "redirect:/board/list";
    }
}
