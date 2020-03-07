<?php

class Category extends DB
{
   public function getallCategories()
  {
      return $this->connect()->query("select * from categories")->fetchAll (PDO::FETCH_ASSOC);
  }  
}
