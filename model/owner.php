<?php

class Owner
{
    private $id;
    private $catId;
    private $owner_name;

    function __construct($catId, $owner_name)
    {
        $this->catId = $catId;
        $this->owner_name = $owner_name;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCatId()
    {
        return $this->catId;
    }

    public function setCatId($catId)
    {
        $this->catId = $catId;
    }

    public function getOwnerName()
    {
        return $this->owner_name;
    }

    public function setOwnerName($owner_name)
    {
        $this->owner_name = $owner_name;
    }
}