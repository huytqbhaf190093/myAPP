<?php 
include("conn.php");
?>
<?php
  $product_per_page = 6; //limit = 3
  $q = mysqli_query($conn , "SELECT COUNT(ID) AS total FROM product "); //đếm số bản ghi trong CSDL đặt vào biến total
  $rs = mysqli_fetch_assoc( $q ); //trả về 1 mảng assoc ( key => value ) => $rs = ['total' => 5]
  $total_product = $rs['total']; //số lượng sản phẩm trong db

  $pages = ceil($total_product / $product_per_page);
  if(!empty($GET['page']))
  {
  	$curent_page = $_GET['page']; //$_GET['page']: lấy trang hiện tại
  }
  else
  {
  	$curent_page=1;
  }
?>
<div class="pagination-wrap">
	<div class="pagination">
		
	 <?php for($i = 0; $i < $pages ; $i++ )
	 {
	 	?>
	 	<a href="index.php?page= <?= $i+1?>"

	 	<?php
	 	if($curent_page==($i+1))
	 	{
	 		echo "class='active'";
	 	}
	 	else
	 	{
	 		echo "";
	 	}
	 	?>
	 	>
	   <?php echo $i+1 ?></a>
	 <?php } ?>

	</div>
</div>