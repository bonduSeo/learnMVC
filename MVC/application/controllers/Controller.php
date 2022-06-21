<?php

namespace application\controllers;

abstract class Controller
{
    public function __construct($action)
    {
        $view = $this->$action();
        //문자열을 받았는데 문자열로 함수호출가능(php에선 간편)
        //그 메소드 호출결과를(문자열) view에 받고
        require_once $this->getView($view);
    }

    protected function addAttribute($key, $val)
    {
        $this->$key = $val;
    }

    protected function getView($view)
    {
        if (strpos($view, "redirect:") === 0) {
            header("Location: http://" . _HOST . substr($view, 9));
        }
        return _VIEW . $view;
    }
}
