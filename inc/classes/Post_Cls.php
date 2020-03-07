<?php 
class Post extends DB 
{
public function getAllPost(){
	return $this->connect()->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);
}
}
?>