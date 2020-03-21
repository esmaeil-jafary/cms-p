<?php


class User extends DB
{
public function getAllUser(){
    return $this->connect()->query("select * from Users")->fetchAll(PDO::FETCH_ASSOC);
}

    public function AddUser($UserName, $Password, $FirstName, $LastName, $Email, $Rol)
    {
        $cn=$this->connect();
        $UserName=$cn->quote("$UserName");
        $Password=$cn->quote("$Password");
        $FirstName=$cn->quote("$FirstName");
        $LastName=$cn->quote("$LastName");
        $Email=$cn->quote("$Email");
        $Rol=$cn->quote("$Rol");
        $query="insert into users (UserName,Password,LastName,FirstName,Email,Rol) values ($UserName,$Password,$LastName,$FirstName,$Email,$Rol)";
        $cn->query($query);
    }

    public function DeleteUser($id)
    {
        $cn=$this->connect();
        $id=$cn->quote($id);
        $cn->query("delete from users where id=$id");
    }

    public function getUser($Uid)
    {
        $cn=$this->connect();
        $id=$cn->quote($Uid);
        return $cn->query("select * from users where id=$id")->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public function UpdateUser($Uid, $UserName, $Password, $FirstName, $LastName, $Email, $Rol)
    {
        $cn=$this->connect();
        $id=$cn->quote($Uid);
        $UserName=$cn->quote($UserName);
        $Password=$cn->quote($Password);
        $FirstName=$cn->quote($FirstName);
        $LastName=$cn->quote($LastName);
        $Email=$cn->quote($Email);
        $Rol=$cn->quote($Rol);
        $query="update users set UserName=$UserName,Password=$Password,FirstName=$FirstName,LastName=$LastName,Email=$Email,Rol=$Rol where id=$id";
        $cn->query($query);
    }

    public function getUserByUsername($UserName)
    {
        $cn=$this->connect();
        $UserName=$cn->quote($UserName);
        return $cn->query("select * from users where Username=$UserName")->fetchAll(PDO::FETCH_ASSOC);
    }
}