<?php
abstract class ACore {
    protected $connect;
    public function __construct(){
        $this->connect = new  mysqli(HOST, USER, PASSWORD, DB);
        if ($this->connect->connect_error){
            exit("Ошибка подключения к базе данных".$this->connect->connect_error);
        }
        //кодировка
        $this->connect->set_charset("utf8");
    }
    public function __destruct(){
        $this->connect->close();
    }
    public function get_body(){
        include "template/index.php";
    }
    public function formatstr($str)     {
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }

}