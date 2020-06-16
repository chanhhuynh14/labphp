<?php
    require_once("config/db.class.php");
    class Category{
        public $cateID;
        public $categoryName;
        public $description;
        public function __construct($cate_name,$desc){
            $this->categoryName = $cate_name;
            $this->description = $desc;

        }
        public function save()
        {
            $db = new Db();
            $sql = "INSERT INTO Category (CategoryName,Descrip) VALUES
            ('$this->categoryName','$this->description')";
            $result = $db->query_execute($sql);
            return $result; 
        }
        public static function list_category()
        {
            $db =  new Db();
            $sql ="SELECT * FROM Category";
            $result = $db->select_to_array($sql);
            return $result;
        }
    }
?>