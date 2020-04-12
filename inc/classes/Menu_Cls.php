<?php


class Menu extends DB
{
    public function getMenu(){
        return $this->connect()->query("select * from menu")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function searchMenu($q){
        $cn=$this->connect();
        $q=$cn->quote($q);
        return $cn->query("select * from menu where name like concat('',$q,'')")->fetchAll(PDO::FETCH_ASSOC);
    }
}