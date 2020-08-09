<?php
class news extends DB
{
    public function getallNews()
    {
		$postAsc="select * from news";
        return $this->connect()->query($postAsc)->fetchAll (PDO::FETCH_ASSOC);
    }
//  دیلیت کردن
    public function deleteNews($catId)
    {
        /*تابع کانکت شدن*/
        $connection = $this->connect();
        /* انجکشن جلوگیری از حملات*/
        $qId = $connection->quote($catId);
        $connection->query(" delete from news where id = $qId");
    }
//	اینسرت کردن
    public function addNews($name,$discrip){
        $cnn=$this->connect();
        $qname = $cnn->quote($name);
        $qdiscript = $cnn->quote($discrip);
        $cnn->query("insert into news (Title , Content,Date ) values ($qname , $qdiscript ,now())");
    }
//	آبدیت کردن
    public function getUpNews($id){
        $cnn=$this->connect();
        $qId=$cnn->quote("$id");
        return $cnn->query("select * from news where id=$qId")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateNews($updateId, $updateName, $updateDescription)
    {
        $cnn=$this->connect();
        $qId=$cnn->quote($updateId);
        $qName=$cnn->quote($updateName);
        $qDescription=$cnn->quote($updateDescription);
        $cnn->query(" update news set Title = $qName , Content = $qDescription, Date=new() where id = $qId ");

    }

}
?>