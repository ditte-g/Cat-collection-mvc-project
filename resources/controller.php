<?php

class Controller
{
    private $model;
    private $cat;
    public function __construct(PDO $db)
    {
        $this->model = new Model($db);
    }
    public function index()
    {
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($page))
            require_once('view/view.php');
        elseif ($page === "cat") {
            require_once('view/view.php');
        } else {

        }
    }

    public function getAllCats()
    {
        return $this->model->getAllNames();

    }
}