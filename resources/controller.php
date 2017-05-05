<?php

class Controller
{
    private $model;

    public function __construct(PDO $db)
    {
        $this->model = new Model($db);
    }

    public function index()
    {
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($page))
            require('view/view.php');
        elseif ($page === "view") {
            if (isset($_POST['delete'])) {
                $id = $_POST['delete'];
                $this->deleteCat($id);
                header('Location: /index.php');
                exit();
            }
            require('view/view.php');
        } elseif ($page === 'create') {
            require('model/create.php');
        } elseif ($page === 'add') {
            $cat = new Cat($_POST['name'], $_POST['birthday'], $_POST['breed']);
            $success = $this->createCat($cat);
            header('Location: /index.php');
        } else {

        }
    }

    public function getAllCats()
    {
        return $this->model->getAllNames();

    }

    public function createCat(Cat $cat)
    {
        return $this->model->createCat($cat);
    }

    public function deleteCat($id)
    {
        return $this->model->deleteCat($id);
    }
}

