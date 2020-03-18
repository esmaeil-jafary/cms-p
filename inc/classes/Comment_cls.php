<?php


class Comment extends DB
{
//ابتدا باید کل لیست کامنتها را لود کنیم برای نمایش
public function getAllComment(){
//    از  را بخاطر این نوشتیم چون میخواهیم تایتل را از جدول پست نشان بدهیم
   return $this->connect()->query("SELECT comments.*,posts.Title AS Post_Title FROM comments INNER JOIN posts ON comments.Post_id=posts.id")->fetchAll(PDO::FETCH_ASSOC);
}

    public function DeleteComment($id)
    {
        $cn=$this->connect();
        $qId=$cn->quote($id);
        $cn->query("delete from comments where id=$qId");

    }

    public function ChangeStatus($id)
    {
        $cn=$this->connect();
        $qId=$cn->quote($id);
//        برای اپدیت کردن اگر صفر بود استتوس بشود 1 و اگر یک بود بشود که با یک عمل ریاضی و قدر مطلق گیری انجام داد 0
         $cn->query("update comments set Status= abs(Status-1) where id=$qId ");
    }

    public function AddComment($Author, $Email, $Content, $PostId)
    {
        $cn=$this->connect();
        $qAuthor=$cn->quote($Author);
        $qEmail=$cn->quote($Email);
        $qContent=$cn->quote($Content);
        $qPostId=$cn->quote($PostId);
        $cn->query("insert into comments (Post_id,Author,Email,Content,Status,Date) values ($qPostId,$qAuthor,$qEmail,$qContent,0,now())");
    }
    public function GetPostComment($Pid) {
        $cn=$this->connect();
        $qId=$cn->quote($Pid);
//        الاا می خواهیم از کل کامنت ها آن کامنتی که تایید شده را نشان بدهیم که استتوس را برابر 1 قرار می دهیم
        $query="select * from comments where Status=1 and Post_id = $qId";
        return $cn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}