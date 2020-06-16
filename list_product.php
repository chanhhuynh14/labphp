<?php
require_once("Entities/product.class.php");
require_once("Entities/category.class.php");

?>
<?php
    include_once("Header.php");
    if (!isset($_GET["cateid"])) {
    	$prods = Product::list_product();
    }
    else{
    	$cateid =$_GET["cateid"];
    	$prods = Product::list_product_by_cateid($cateid);
    }
    $cates = Category::list_category();
    $prods = Product::list_product();
?>
<div class="container text-center">
	<div class="col-sm-3">
		<h3>Danh mục</h3>
		<ul class="list_group">
			<?php
				foreach ($cates as $item) {
					echo "<li class='list-group-item'>
					<a href=/LAB3/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a>
					</li>";
				}
			?>
		</ul>
	</div>
	<div class="col-sm-9">
		<h3>Sản phẩm cửa hàng</h3>
		<div class="row">
			<?php
				foreach ($prods as $item) {
			?>
			<div class="col-sm-4">
			<img src="<?php echo "/LAB3".$item["Picture"];?>" class="img-responsive" styte="" >
			
			<a href="/LAB3/product_detail.php?id=<?php echo $item["ProductID"];?>"><p class="text-danger"><?php echo $item["ProductName"]; ?>
				
			</p></a>
			<p class="text-info"><?php echo $item["Price"]; ?></p>
			<p>
				<button type="button" class="btn btn-primary">Mua hàng</button>
			</p>
			</div>
			<?php
	 		} 
	 		?>
		</div>
	</div>
	
</div>
<style type="text/css">
	.img-responsive {
		width: 300px;
	}
</style>