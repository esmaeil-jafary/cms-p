<?php
// توجه : بعد از وارد کردن مقادیر ؟؟؟؟ نام فایل را به 
//db.php تغییر دهید 

class DB
{
    private $serverName;
    private $username;
    private $password;
    private $dbName;
    private $charset;

    protected function connect (){

        $this->serverName="localhost";//آدرس دیتابیس - عموما لوکال هاست
        $this->username="????";//نام کاربر دیتابیس
        $this->password="????";//پسورد کاربر دیتابیس
        $this->dbName="????";//نام دیتابیس
        $this->charset="utf8mb4";
        try {
            $dsn = "mysql:host=$this->serverName;dbname=$this->dbName;charset=$this->charset";
            $pdo = new PDO ($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch (Exception $e){
            die("connection failed ".$e->getMessage());
        }

    }
}
