<?php 
class Post extends DB 
{
public function getAllPost(){
	return $this->connect()->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);
}
	public function SearchPost($SearchQuery){
		//تابع اتصال به دیتا بیس
		$connect=$this->connect();
		//برای اینکه در حملات اینجکشن نتوانند از کوتیشن استقاده کنن
		$SearchQuery= '%'.$SearchQuery. '%';
		//جلوگیری از حملات اینجکشن
		$SearchQuery=$connect->quote($SearchQuery);
		//کوری جستجو
		$Query="select * from Posts where Title like $SearchQuery or Author like $SearchQuery or Content like $SearchQuery or Tage like $SearchQuery ";
		return $connect->query($Query)->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>