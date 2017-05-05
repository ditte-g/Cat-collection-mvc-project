<?php

class Controller
{
    private $model;
    private $cat;
    public function __construct(PDO $db, $cat)
    {
        $this->model = new Model($db);
        $this->cat = new Cat($cat);
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

    public function createCat()
    {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $this->cat->setName($name);
            $birthday = $_POST['birthday'];
            $this->cat->setBirthday($birthday);
            $breed = $_POST['breed'];
            $this->cat->setBreed($breed);
        }
        return $this->model->createCat($name, $birthday, $breed);
    }
}