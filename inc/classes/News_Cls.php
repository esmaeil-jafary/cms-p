<?php
class news extends DB
{
    public function getallNews()
    {
        return $this->connect()->query("select * from news")->fetchAll (PDO::FETCH_ASSOC);
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
        $cnn->query("insert into news (Title , Content,Date ) values ($qname , $qdiscript ,$jdate");
    }
//	آبدیت کردن
    public function getUpNews($id){
        $cnn=$this->connect();
        $qIt=$cnn->quote("$id");
        return $cnn->query("select * from news where id=$qIt")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateNews($updateId, $updateName, $updateDescription)
    {
        $cnn=$this->connect();
        $qId=$cnn->quote($updateId);
        $qName=$cnn->quote($updateName);
        $qDescription=$cnn->quote($updateDescription);
        $cnn->query(" update news set Title = $qName , Content = $qDescription, Date=new() where id = $qId ");

    }
//    برای منو ها
//    public function getMenu(){
//        return $this->connect()->query("select * from menu")->fetchAll(PDO::FETCH_ASSOC);
//    }
//    public function searchMenu($q){
//        $cn=$this->connect();
//        $q=$cn->quote($q);
//        return $cn->query("select * from menu where name like concat('',$q,'')")->fetchAll(PDO::FETCH_ASSOC);
//    }
}
?>