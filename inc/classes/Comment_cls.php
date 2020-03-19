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

//        برای اینکه وقتب کامنتی را ÷اک می کمنیم از کامنت کانت ÷اک کند
//وچون برای پاک کردن کامنت کانت نیاز به پوست ادی می باشد می نوسیم
        $PostId=$cn->query("select * from comments where id=$qId")->fetchAll(PDO::FETCH_ASSOC)[0]["Post_id"];
        $cn->query("update posts set Comment_Count=Comment_Count-1 where id=$PostId");
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
        $Author=$cn->quote($Author);
        $Email=$cn->quote($Email);
        $Content=$cn->quote($Content);
        $PostId=$cn->quote($PostId);
        $cn->query("insert into comments (Post_id,Author,Email,Content,Status,Date) values ($PostId,$Author,$Email,$Content,0,now())");
//        برای اینکه هر کامنتی اضافه شد آن را کامنت کانت بشمرد می نوسیم
       $cn->query("update posts set Comment_Count=Comment_Count+1 where id=$PostId");
    }
    public function GetPostComment($Pid) {
        $cn=$this->connect();
        $qId=$cn->quote($Pid);
//        الاا می خواهیم از کل کامنت ها آن کامنتی که تایید شده را نشان بدهیم که استتوس را برابر 1 قرار می دهیم
//        برای اینکه کامنتها را به ترتیب اخرین پست نمایش دهد آن را دیسیندین می کمنینم
        $query="select * from comments where Status=1 and Post_id = $qId order by Date desc ";
        return $cn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}