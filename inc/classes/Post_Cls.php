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
	public function AddPost( $Category_id, $Title,$Author, $Image,$Content, $Tage,$Status) {
    $cn=$this->connect();
    $qCategory_id=$cn->quote( $Category_id);
    $qTitle=$cn->quote($Title);
    $qAuthor=$cn->quote($Author);
    $qImage=$cn->quote($Image);
    $qContent=$cn->quote($Content);
    $qTage=$cn->quote($Tage);
    $qStatus=$cn->quote($Status);
    $query="insert into posts (Category_id , Title , Author , Date , Image , Content , Tage , Comment_Count , Status ) values ( $qCategory_id ,$qTitle,$qAuthor, now() ,$qImage,$qContent,$qTage, 0 ,$qStatus)";
    $cn->query($query);
}
public function DeletePost($PostId){
    $cn=$this->connect();
    $qid=$cn->quote($PostId);
    $query="delete from posts where id=$qid";
    $cn->query($query);
}
}

?>