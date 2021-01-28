<?php  
session_start();
require_once('inc/conn.php');
include('inc/header.php');

?>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE ID = {$id}";
    $rs = mysqli_query($conn ,$sql);
    while ($row= mysqli_fetch_assoc($rs)) {
    ?>  
    <div class="single-product">

      <div class="product-image ">
        <img src="img/<?php echo $row['anh']?>">
      </div>
            <div class="product-information">
             <h2 class="singlerproduct-title">
       <?php echo $row['ten']?>
             </h2>

             <div class="sigleproduct-content">
                <p>product information: </p><br>
                <div class="siglernote">
                <?php echo $row['noidung'] ?>
                </div>
       </div> 

       <p class="singlerproduct-price">
        <?php echo  $row['giatien'] ." $"?>
       </p>
       <form method="POST" action="cart.php">
        Quantity:
        <input type="number" name="sl" value="1"><br>
        <input type="hidden" name="ID" value="<?=$id ?>">
        <input type="submit" class="button-buy" value="Buy">

       </form>
            </div>
      <!-- end product conten -->
      <?php
    } //dont the while
    ?>
     </div>
    
    
  <!-- end left column -->
  <?php
  include('inc/footer.php');
  ?>