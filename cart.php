<?php
 session_start();
  include("inc/conn.php");
  include('inc/header.php');

  if($_SERVER['REQUEST_METHOD'] == 'POST' ){
  	 $id = $_POST['id'];

  	 if( empty($_SESSION['cart'][$id] ) ){ //kiểm tra giỏ hàng trong lần đầu tiên mua
       $q = mysqli_query( $conn, "SELECT * FROM product WHERE id = {$id}" );
         $product = mysqli_fetch_assoc($q);

         // Thêm product này vào trong session

       $_SESSION['cart'][$id] = $product;
       $_SESSION['cart'][$id]['sl'] = $_POST['sl'];
  	 }else{
  	 //nếu sản phẩm không tồn tại trong session rồi
  	 $slMoi = $_SESSION['cart'][$id]['sl'] + $_POST['sl']; //số lượng cu + sl mới
  	 $_SESSION['cart'][$id]['sl'] = $slMoi;

  }
          }
?>

<div class="row">
	<div class="leftcolumn">
		<link rel="stylesheet" type="text/css" href="css/card.css">
		<h3 style="text-align: center;" class="title"> GIỎ HÀNG </h3>
		<?php
		  //loop tu section lay product ra
  if(!empty ( $_SESSION['cart'] ) ) //nếu giỏ hàng trống
  	foreach ($_SESSION['cart'] as $item):
  		?>
  	<a href = "single-product.php?id=<?php echo $item['id']?>" class="product">
  		      <h2 class="product-title"><?php echo $item['ten'] ?></h2>
  		      <div class="product-image"><img src="img/<?php echo $item ['anh'] ?>"/></div>
  		<p class="sl">Số Lượng: <?php echo $item['sl'] ?></p>
  	</a>
  <?php
endforeach;
else
  echo "Không có sản phẩm trong giỏ hàng! ";
?>
  <div id="total" class="clearfix">
  	   <?php
  	$tong = 0 ;
  	  
  	  foreach ($_SESSION['cart'] as $item ) {
  	  	$tong = $tong + ($item['sl'] * $item ['giatien']);
  	  }
  	?>
  <h3> Thành tiền: <?php echo number_format($tong) ?> $</h3>
</div>
    </div>