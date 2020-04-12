<?php

class Post extends DB
{
//    برای نشان دادن نام نویسنده ادمین پست
private $query="select p.id,Category_id,Title,concat(u.FirstName,' ',u.LastName)
as Author,Date,p.Image,Content,Tage,Status,View_Count,(select COUNT(id)
from comments where comments.Post_id=p.id) as Comment_Count from posts as p
INNER JOIN users as u on u.id=p.author_id";
//    برای پیج بندی در اخر صفحه وقتی مطالب زیاد است برود و صفحه گذاری بکند
public function getAllPostCount(){
//    فقط تعداد کل پست ها را به ما بدهد
    return $this->connect()->query("select COUNT(id) as Cnt from posts")->fetchAll(PDO::FETCH_ASSOC)[0]["Cnt"];
}
    public function getAllPost()
    {

        return $this->connect()->query($this->query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function SearchPost($SearchQuery)
    {
        //تابع اتصال به دیتا بیس
        $connect = $this->connect();
        //برای اینکه در حملات اینجکشن نتوانند از کوتیشن استقاده کنن
        $SearchQuery = '%' . $SearchQuery . '%';
        //جلوگیری از حملات اینجکشن
        $SearchQuery = $connect->quote($SearchQuery);
        //کوری جستجو
        $Query = "select * from Posts where Title like $SearchQuery or Author like $SearchQuery or Content like $SearchQuery or Tage like $SearchQuery ";
        return $connect->query($Query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AddPost($Category_id, $Title, $Author, $Image, $Content, $Tage, $Status)
    {
        $cn = $this->connect();
        $qCategory_id = $cn->quote($Category_id);
        $qTitle = $cn->quote($Title);
        $qAuthor = $cn->quote($Author);
        $qImage = $cn->quote($Image);
        $qContent = $cn->quote($Content);
        $qTage = $cn->quote($Tage);
        $qStatus = $cn->quote($Status);
        $query = "insert into posts (Category_id , Title , Author_id , Date , Image , Content , Tage , Comment_Count , Status ) values ( $qCategory_id ,$qTitle,$qAuthor, now() ,$qImage,$qContent,$qTage, 0 ,$qStatus)";
        $cn->query($query);
    }

    public function DeletePost($PostId)
    {
        $cn = $this->connect();
        $qid = $cn->quote($PostId);
        $query = "delete from posts where id=$qid";
        $cn->query($query);
    }

//برای ادیت کردن پست ها
    public function GetPost($id)
    {

        $cn = $this->connect();
        $query = "$this->query where p.id={$cn->quote($id)}";
        return $cn->query($query)->fetchAll(PDO::FETCH_ASSOC);
//معنی این کوری این است که یک ایدی میفرستیم براش و کوت میکند بعد کوءری را اجرا میکند

    }

//برای ذخیره کردن آپدیت و ویرایش
    public function UpdatePost($id, $Title, $Category_id, $Image, $Content, $Tage, $Status)
    {
        $cn = $this->connect();
        $qId = $cn->quote($id);
        $qTitle = $cn->quote($Title);
        $qCategory_id = $cn->quote($Category_id);
//        چون نویسده پست را از نام ادمین می خواند کامنت میکنیم
//        $qAuthor = $cn->quote($Author);
        $qImage = $cn->quote($Image);
        $qContent = $cn->quote($Content);
        $qTage = $cn->quote($Tage);
        $qStatus = $cn->quote($Status);
        $query = "update posts set Title=$qTitle , Category_id=$qCategory_id , Image=$qImage , Content=$qContent , Tage=$qTage , Status=$qStatus where id=$qId ";
        $cn->query($query);
    }

    public function GetPosts($catid)
    {
        $cn=$this->connect();
        $qcatId=$cn->quote($catid);
        return $this->connect()->query("select * from posts where Status='Publish' and Category_id=$qcatId")->fetchAll(PDO::FETCH_ASSOC);
    }
    //    برای ایجاد عملیات گروهی دوتا متغیر می دهیم تا استتوس آن را عوض کند
//از تابع این وقتی استفاده می شود که بخواهیم مثلا خانه یک و چهر و پنج  را بخواهیم
//برای تبدیل ارایه ای که چند تا خانه دارد به این حالت از تابع جوین استفاده می شود
//یعنی چون ما قبلا  از حلقه استفاده می کردیم همه ایدی عا را چک می کزرد ولی الان ما می خوااهیم بگوییم فقط این آیدی هایی که مدنظر ماست را بیاور

    public function ChangePostStatus($ar,$Status )
    {
        $JoinedAr=join(",",$ar);
        $query="update posts set Status='$Status' where id in ($JoinedAr)";
        $this->connect()->query($query);
    }
//    برای دیلیت کردن اگر ما داخل حلقه بگذاریم وقتی تعدد زیاد شود دیر عمل میکند که برای رفع مشکل این کوری را می نویسیم
    public function ِDeleteBulkPosts($ar)
    {
        $JoinedAr=join(",",$ar);
        $query="delete from posts where id in ($JoinedAr)";
        $this->connect()->query($query);
    }
    public function getPostByAuthor($Author){
        $cn = $this->connect();
        $Author=$cn->quote("$Author");
        return $cn->query("select*from posts where Status='Publish' and Author=$Author")->fetchAll(PDO::FETCH_ASSOC);
    }
//برای شماره انداز بازدید پست
    public function IncrimentView($Pid)
    {
        $cn=$this->connect();
        $Pid=$cn->quote($Pid);
        $query="update posts set View_Count=View_Count+1 where id=$Pid";
        $cn->query($query);
    }

    public function getAllPostByPage($PageLength, $Page)
    {
//        الان باید بگوییم اگر پیج ما 1 بود از 1تا 5 را نشان بده و اگر 2 بود از 5تا 10 و ..
//        الان اگر صفحه مثلا 2 بود 2ضربدر طول که 5 تا گذاشتیم می شود و 10 منهای یک5 میشود و 5 تا 10 را نشان میدهد

        $PageLimit=$Page*$PageLength-$PageLength;
        return $this->connect()->query("$this->query limit $PageLimit,$PageLength")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCatsPostCount($catid)
    {
        $cn=$this->connect();
        $qcatId=$cn->quote($catid);
        return $this->connect()->query("select count(id) as Cnt from posts where Status='Publish' and Category_id=$qcatId")->fetchAll(PDO::FETCH_ASSOC)[0]["Cnt"];
    }

    public function GetCategoryPostByPage($catid, $PageLength, $Page)
    {

        $PageLimit=$Page*$PageLength-$PageLength;
        $cn=$this->connect();
        $qcatId=$cn->quote($catid);
        return $cn->query("$this->query where Status='Publish' and Category_id=$qcatId limit $PageLimit,$PageLength ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAuthorPostCount($Author)
    {
        $cn=$this->connect();
        $Author=$cn->quote($Author);
        return $this->connect()->query("select count(id) as Cnt from posts where Status='Publish' and Author=$Author")->fetchAll(PDO::FETCH_ASSOC)[0]["Cnt"];
    }

    public function getAuthorPostByPage($Author, $PageLength, $Page)
    {
        $PageLimit=$Page*$PageLength-$PageLength;
        $cn=$this->connect();
        $Author=$cn->quote($Author);
        return $cn->query("$this->query  where Status='Publish' and concat(u.FirstName,' ',u.LastName)=$Author limit $PageLimit,$PageLength ")->fetchAll(PDO::FETCH_ASSOC);
    }
public function getNewsView(){
	return $this->connect()->query("select * from News")->fetchAll (PDO::FETCH_ASSOC);
}
}

?>