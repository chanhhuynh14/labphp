<?php
    require_once("Entities/product.class.php");
    require_once("Entities/category.class.php");
    if(isset($_POST["btnsubmit"])){
        $productName = $_POST["txtName"];
        $cateID = $_POST["txtCateID"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdesc"];
        $picture = $_FILES["txtpic"];
        $newProduct = new Product($productName,$cateID,$price,$quantity,$description,$picture);
        $result = $newProduct->save();
        if(!$result)
        {
            header("Location: add_product.php?failure");
        }
        else
        {
            header("Location: add_product.php?inserted");
        }
    }
?>
<?php include_once("Header.php"); ?>
<?php
        if(isset($_GET["inserted"])){
            echo "<h2>Thêm danh mục thành công</h2>";
        }
?>
<form method="post" enctype="multipart/form-data" style="margin-left: 200px;color: aliceblue;
    font-family: monospace;">
    <div class="row">
        <div class="lbltitle">
            <h3>Tên sản phẩm </h3>
        </div>  
        <div class="input-group mb-6">
            <div class="lblinput">
            <input class="form-control" type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] :""; ?>"/>
        </div>
        </div>
        
    </div>

    <div class="row">
        <div class="lbltitle">
            <h3> Mô tả sản phẩm </h3>
        </div>
       <div class="input-group mb-6">
           <div class="lblinput">
            <textarea class="form-control" name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] :""; ?>" > </textarea>
        </div>       
       </div>

        
    </div>

    <div class="row">
        <div class="lbltitle">
            <h3> Số lượng </h3>
        </div>
        <div class="input-group mb-6">
            <div class="lblinput">
            <input class="form-control" type="number" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] :""; ?>"/>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="lbltitle">
            <h3> Giá tiền </h3>
        </div>
        <div class="input-group mb-6">
            <div class="lblinput">
            <input class="form-control" type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] :""; ?>"/>
            </div>
        </div>

        
    </div>

    <div class="row">
        <div class="lbltitle">
            <h3> Loại sản phẩm </h3>
        </div>
        <div class="input-group mb-6">
            <div class="lblinput">
            <select class="form-control" name="txtCateID">
            <option value="" selected >Chọn loại </option>
            <?php
                $cates = Category::list_category();
                foreach($cates as $item)
                {
                    echo "<option value='".$item["CateID"]."'>".$item["CategoryName"]."</option>";
                }
            ?>
            </select>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="lbltitle">
            <h3> Hình ảnh</h3>
        </div>
                <div class="input-group mb-6">
                    <div class="lblinput">
            <input type="file" name="txtpic" accept=".PNG,.GIF,.JPG" value="<?php echo isset($_POST["txtpic"]) ? $_POST["txtpic"] :""; ?>"/>
        </div>
                </div>

        
    </div>

    <div class="row">
        <div class="submit">
            <input class="btn btn-info"  type="submit" name="btnsubmit" value="Thêm sản phâm"/>
        </div>
    </div>
</form>
<?php include_once("Footer.php");?>
