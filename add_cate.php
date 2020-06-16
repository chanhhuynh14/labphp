<?php
    require_once("Entities/category.class.php");
    if(isset($_POST["btnsubmit"])){
        $categoryName = $_POST["txtNameCate"];
        $description = $_POST["txtdescCate"];

        $newCategory = new Category ($categoryName,$description);
        $result = $newCategory->save();
        if(!$result)
        {
            header("Location: add_cate.php?failure");
        }
        else
        {
            header("Location: add_cate.php?inserted");
        }
    }
?>
<?php include_once("Header.php"); ?>
<?php
        if(isset($_GET["inserted"])){
            echo "<h2>Thêm danh mục sản phẩm thành công</h2>";
        }
?>
<form method="post">
    <div class="row">
        <div class="lbltitle">
            <label> Tên danh mục </lable>
        </div>
        <div class="lblinput">
            <input type="text" name="txtNameCate" value="<?php echo isset($_POST["txtNameCate"]) ? $_POST["txtNameCate"] :""; ?>"/>
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <label> Mô tả danh mục </lable>
        </div>
        <div class="lblinput">
            <textarea name="txtdescCate" cols="21" rows="10" value="<?php echo isset($_POST["txtdescCate"]) ? $_POST["txtdescCate"] :""; ?>" > </textarea>
        </div>       
    </div>

    

    <div class="row">
        <div class="submit">
            <input type="submit" name="btnsubmit" value="Thêm danh mục"/>
        </div>
    </div>
</form>
<?php include_once("Footer.php");?>
