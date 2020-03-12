<?php 
class Category extends DB
{
   public function getallCategories()
  {
      return $this->connect()->query("select * from categories")->fetchAll (PDO::FETCH_ASSOC);
  }
//  دیلیت کردن
	public function deleteCategory($catId)
	{
		/*تابع کانکت شدن*/
		$connection = $this->connect();
		/* انجکشن جلوگیری از حملات*/ 
		$qId = $connection->quote($catId);
 		$connection->query(" delete from categories where id = $qId");
	}
//	اینسرت کردن
	public function addcategory($name,$discrip){
		$cnn=$this->connect();
		$qname = $cnn->quote($name);
		$qdiscript = $cnn->quote($discrip);
		$cnn->query("insert into categories (name , Description ) values ($qname , $qdiscript )");
	}
//	آبدیت کردن
	public function getCategory($id){
       $cnn=$this->connect();
       $qIt=$cnn->quote("$id");
       return $cnn->query("select * from categories where id=$qIt")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCategory($updateId, $updateName, $updateDescription)
    {
        $cnn=$this->connect();
        $qId=$cnn->quote($updateId);
        $qName=$cnn->quote($updateName);
        $qDescription=$cnn->quote($updateDescription);
        $cnn->query(" update categories set name = $qName , Description = $qDescription where id = $qId ");

    }

}
?>