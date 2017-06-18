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

    public function getOwner()
    {
        $read_stm = $this->db->prepare('SELECT * FROM `owner`');
        $read_stm->execute();
        $read_stm->setFetchMode(PDO:: FETCH_ASSOC);
        $owner = $read_stm->fetchAll();
        $owner = array_map(function ($item) {
            $owner = new Owner($item['cats_id'], $item['owner_name']);
            $owner->setId($item['id']);
            return $owner;
        }, $owner);
        return $owner;
    }

    public function getById($id)
    {
        $get_stm = $this->db->prepare('SELECT * FROM `cats` WHERE id = :id');
        $get_stm->bindValue(':id', $id);
        $get_stm->execute();
        $get_stm->setFetchMode(PDO:: FETCH_ASSOC);
        $result = $get_stm->fetch();
        $cat = new Cat($result['name'], $result['birthday'], $result['breed']);
        $cat->setId($result['id']);
        return $cat;
    }

    public function getByOwnerId($id)
    {
        $get_stm = $this->db->prepare('SELECT * FROM `owner` WHERE id = :id');
        $get_stm->bindValue(':id', $id);
        $get_stm->execute();
        $get_stm->setFetchMode(PDO:: FETCH_ASSOC);
        $result = $get_stm->fetch();
        $owner = new Owner($result['cats_id'], $result['owner_name']);
        $owner->setId($result['id']);
        return $owner;
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

    public function createOwner(Owner $owner)
    {
        $createOwner_stm = $this->db->prepare('INSERT INTO `owner` (`cats_id`, `owner_name`) VALUES (:cats_id, :ownerName)');
        $createOwner_stm->bindValue(':cats_id', $owner->getCatId());
        $createOwner_stm->bindValue(':ownerName', $owner->getOwnerName());
        $success = $createOwner_stm->execute();
        $id = $this->db->lastInsertId();
        $owner->setId($id);
        return $success;
    }

    public function deleteCat($id)
    {
        $delete_stm = $this->db->prepare("DELETE FROM `cats` WHERE id = :id");
        $delete_stm->execute([':id' => $id]);
        return $delete_stm;
    }

    public function deleteOwner($id)
    {
        $delete_stm = $this->db->prepare("DELETE FROM `owner` WHERE id = :id");
        $delete_stm->execute([':id' => $id]);
        return $delete_stm;
    }

    public function updateCat($cat)
    {
        $update_stm = $this->db->prepare('UPDATE `cats` SET `name`=:name, `birthday`=:birthday, `breed`=:breed WHERE `id`=:id');
        $update_stm->bindValue(":id", $cat->getId());
        $update_stm->bindValue(":name", $cat->getName());
        $update_stm->bindValue(":birthday", $cat->getBirthday());
        $update_stm->bindValue(":breed", $cat->getBreed());
        return $update_stm->execute();
    }

    public function updateOwner($owner)
    {
        $update_stm = $this->db->prepare('UPDATE `owner` SET `owner_name`=:ownerName WHERE `id`=:id');
        $update_stm->bindValue(":id", $owner->getId());
        $update_stm->bindValue(":ownerName", $owner->getOwnerName());
        return $update_stm->execute();
    }
}