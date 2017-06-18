<?php

class Controller
{
    private $model;

    public function __construct(PDO $db)
    {
        $this->model = new Model($db);
    }

    /**
     *
     */
    public function index()
    {
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($page))
            require('view/view.php');
        elseif ($page === "view") {
            require('view/view.php');
        } elseif ($page === "owner") {
            require('view/view_owner.php');
        } elseif ($page === 'create') {
            require('view/create.php');
        } elseif ($page === 'add') {
            $cat = new Cat($_POST['name'], $_POST['birthday'], $_POST['breed']);
            $success = $this->createCat($cat);
            header('Location: /index.php');
        } elseif ($page === 'create_owner') {
            require('view/create_owner.php');
        } elseif ($page === 'add2') {
            $owner = new Owner($_POST['cats_id'], $_POST['ownerName']);
            $success = $this->createOwner($owner);
            header('Location: /index.php');
        } elseif ($page === 'delete') {
            $id = $_GET['id'];
            $this->deleteCat($id);
            header('Location: /index.php');
            exit();
        } elseif ($page === 'deleteOwner') {
            $id = $_GET['id'];
            $this->deleteOwner($id);
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
        } elseif ($page === 'updateOwner') {
            if (!empty($_POST)) {
                $owner = $this->getByOwnerId($_POST['id']);
                $owner->setOwnerName($_POST['ownerName']);
                $this->updateOwner($owner);
                header('Location: /index.php');
                exit();
            } else {
                $id = $_GET['id'];
                $owner = $this->getByOwnerId($id);
                require('view/update_owner.php');
            }
        } else {
        }
    }


    public function getById($id)
    {
        return $this->model->getById($id);
    }

    public function getByOwnerId($id)
    {
        return $this->model->getByOwnerId($id);
    }

    public function getOwnerId($id)
    {
        return $this->model->getOwnerId($id);
    }

    public function getAllCats()
    {
        return $this->model->getAllNames();

    }

    public function getOwner()
    {
        return $this->model->getOwner();

    }

    public function createCat(Cat $cat)
    {
        return $this->model->createCat($cat);
    }

    public function createOwner(Owner $owner)
    {
        return $this->model->createOwner($owner);
    }

    public function deleteCat($id)
    {
        return $this->model->deleteCat($id);
    }

    public function deleteOwner($id)
    {
        return $this->model->deleteOwner($id);
    }

    public function updateCat($cat)
    {
        return $this->model->updateCat($cat);
    }

    public function updateOwner($owner)
    {
        return $this->model->updateOwner($owner);
    }
}

