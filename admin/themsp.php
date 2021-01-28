<?php
include( "../inc/conn.php");
if($_SERVER['REQUEST_METHOD'] == 'POST' ){
	$tensp = $_POST['tensp'];
	$mota = $_POST['noidung'];
	$giasp = $_POST['giasp'];
$sql = "INSERT INTO product( ten , noidung , giatien ) VALUES(?, ?, ?) ";
//php prepare statement == chuẩn bị tình huống
    $stmt = mysqli_prepare($conn , $sql);
    mysqli_stmt_bind_param( $stmt, "ssd", $tensp, $mota, $giasp );
    //s = string 
    //d = double
    //i = integer
    if(mysqli_stmt_excute($stmt) ) {
       echo " đã thêm sản phẩm thành công !";
    }else{
    	echo "Lõi: " . mysqli_error($conn);//hàm lấy lõi gần nhất của connection sinh ra
    }
}
include ("inc/header.php");
?>
    <form class = "form" method = "post">
    	<label>Nhập tên sản phẩm </label>
    	<input type="text" name="tensp"/>
    	<label>Nhập giá sản phẩm</label>
    	<input type="number" name="giasp">
    	<label>Nhập mô tả sản phẩm</label>
    	<textarea name = "noidung"></textarea>
    	<label>Chọn ảnh sản phẩm</label>
    	<input type="file" name="anhsp">
    	<input type="submit" name="submit" value="Thêm">
    </form>
<?php
include ("inc/footer.php");