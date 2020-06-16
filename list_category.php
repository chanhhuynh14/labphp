<?php
require_once("Entities/category.class.php");
?>
<?php
    include_once("Header.php");
    $prods = category::list_category();
    foreach($prods as $item)
    {
        echo "<p>ten danh mục :".$item["CategoryName"]."</p>";
        echo "<p>mo ta danh mục :".$item["Descrip"]."</p>";
    }
    include_once("Footer.php");
    
?>