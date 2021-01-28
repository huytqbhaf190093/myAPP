<?php
require_once("inc/conn.php");
include( 'inc/header.php');
?>

<div class = "row">
	<div class = "leftcolumn">
		
		<?php
		  // ?page=2 => $_GET['page'] = 3 =>

		    if(!empty($_GET['page']))
		    {
		    	$page = $_GET['page'] - 1;
		    }
		    else
		    {
		    	$page = 0;
		    }
		    //$page = !empty($_GET['page']) ? ($_GET['page'] - 1 ):0 ; // lấy page hiện tại
		    $product_per_page = 6 ; // 1 trang 6 sản phẩm
		        $offset = $product_per_page * $page; //offset chính là cần phần bỏ qua 
		    $sql = "SELECT * FROM product LIMIT $offset, $product_per_page";
		    $rs = mysqli_query($conn , $sql);

		    if( mysqli_num_rows($rs) > 0 ){
		    	while ( $row = mysqli_fetch_assoc($rs) ) {
		    ?>
		      <a href="single-product.php?id=<?php echo $row['id']?>" class = "product">
		      	<h2 class="product-title"><?php echo $row ['ten'] ?></h2>
		      <div class="product-image"><img src="img/<?php echo $row['anh'] ?>" />
		      </div>
		        <p id="price"> <?php echo $row['giatien']." $ " ?> </p>
		        </a>
		<?php

		          }//end while

		    }//check số hàng trả về > 0 
		 ?>


		      <?php include('inc/pagination.php'); ?>
	</div>
	<!-- END left column -->
	          <?php include('inc/footer.php'); ?>