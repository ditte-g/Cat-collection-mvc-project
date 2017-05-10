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
            require('view/view.php');
        } elseif ($page === 'create') {
            require('view/create.php');
        } elseif ($page === 'add') {
            $cat = new Cat($_POST['name'], $_POST['birthday'], $_POST['breed']);
            $success = $this->createCat($cat);
            header('Location: /index.php');
        } elseif ($page === 'delete') {
            $id = $_GET['id'];
            $this->deleteCat($id);
            header('Location: /index.php');
            exit();
        } elseif ($page === 'update') {
            if (!empty($_POST)) {
                $cat = $this->getById($_POST['id']);
                $cat->setName($_POST['name']);
                $cat->setBirthday($_POST['birthday']);
                $cat->setBreed($_POST['breed']);
                $this->updateCat($cat);
                header('Location: /index.php');
                exit();
            } else {
                $id = $_GET['id'];
                $cat = $this->getById($id);
                require('view/update.php');
            }
        } else {
        }
    }


    public function getById($id)
    {
        return $this->model->getById($id);
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

    public function updateCat($cat)
    {
        return $this->model->updateCat($cat);
    }
}

