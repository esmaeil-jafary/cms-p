<!--برای اینکه در پنل ادمین تعداد کامنتها و پست ها و ... بشمارد برای ما-->
<?php


class Report extends DB
{
//ابتدا باید تعداد پست ها را دربیاوریم
function getPostCount() {
    $query="select count(id) as cnt from posts";
    $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
    return $result[0]["cnt"];
}
    function getUserCount() {
        $query="select count(id) as cnt from users";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
}
    function getCommentCount() {
        $query="select count(id) as cnt from comments";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
}
    function getCategoryCount() {
        $query="select count(id) as cnt from categories";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
}

    public function getActivePostCount()
    {
        $query="select count(id) as cnt from posts where Status='publish'";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }

    public function getDraftPostCount()
    {
        $query="select count(id) as cnt from posts where Status='Draft'";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }

    public function getAdminUserCount()
    {
        $query="select count(id) as cnt from users where Rol='Admin'";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }

    public function getSubscriberUserCount()
    {
        $query="select count(id) as cnt from users where Rol='Subscriber'";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];
    }

    public function getApproveCommentCount()
    {
        $query="select count(id) as cnt from comments where 'Status=1'";
        $result=$this->connect()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]["cnt"];

    }
}