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
            return new
            Cat($item['id'], $item['name'], $item['birthday'], $item['breed']);
        }, $cat);
        return $cat;
    }

    public function createCat($name, $birthday, $breed)
    {
        $create_stm = $this->db->prepare("INSERT INTO `cats` (`name`, `birthday`, `breed`) VALUES(:name, :birthday, :breed)");
        $create_stm->execute(['name' => $name, 'birthday' => $birthday, 'breed' => $breed]);
        return $create_stm;

    }
}