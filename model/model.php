<?php

class Model
{

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }


    public function getAllNames()
    {
        $read_stm = $this->db->prepare('SELECT * FROM `cats`');
        $read_stm->execute();
        $read_stm->setFetchMode(PDO:: FETCH_ASSOC);
        $cat = $read_stm->fetchAll();
        $cat = array_map(function ($item) {
            $cat = new Cat($item['name'], $item['birthday'], $item['breed']);
            $cat->setId($item['id']);
            return $cat;
        }, $cat);
        return $cat;
    }

    public function createCat(Cat $cat)
    {
        $create_stm = $this->db->prepare('INSERT INTO `cats` (`name`, `birthday`, `breed`) VALUES (:name, :birthday, :breed)');
        $create_stm->bindValue(':name', $cat->getName());
        $create_stm->bindValue(':birthday', $cat->getBirthday());
        $create_stm->bindValue(':breed', $cat->getBreed());
        $success = $create_stm->execute();
        $id = $this->db->lastInsertId();
        $cat->setId($id);
        return $success;
    }

    public function deleteCat($id)
    {
        $delete_stm = $this->db->prepare("DELETE FROM `cats` WHERE id = :id");
        $delete_stm->execute([':id' => $id]);
        return $delete_stm;
    }
}