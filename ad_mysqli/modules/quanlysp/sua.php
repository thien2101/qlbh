<?php
$sql_sua_sp = "SELECT * FROM sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1 ";
$sth = $pdo -> query($sql_sua_sp);
// $query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);

?>
<p>Chỉnh sửa thông tin sản phẩm</p>
<table class="bang1" border="1" style="border-collapse:collapse;">
<?php
while($row = $sth -> fetch()){
?>
  <form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $_GET['idsanpham'] ?>" enctype="multipart/form-data">
    <tr>
        <td>Tên sản phẩm</td>
        <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham" ></td>
    </tr>
    <tr>
        <td>Mã sp</td>
        <td><input type="text"  value="<?php echo $row['masp'] ?>"name="masp" ></td>
    </tr>
    <tr>
        <td>Giá sp</td>
        <td><input type="text" value="<?php echo $row['giasp'] ?>"name="giasp" ></td>
    </tr>
    <tr>
        <td>Số lượng</td>
        <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong" ></td>
    </tr>
    <tr>
        <td>Hình ảnh</td>
        <td>
          <input type="file" name="hinhanh" >
          <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="200px" height="250px">
        </td>
    </tr>
    <tr>
        <td>Tóm tắt</td>
        <td><textarea name="tomtat"    rows="10"><?php echo $row['tomtat'] ?></textarea></td>
    </tr>
    <tr>
        <td>Nội dung</td>
        <td><textarea name="noidung"   rows="10"><?php echo $row['noidung'] ?></textarea></td>
    </tr>
    <tr>
        <td>Danh mục sản phẩm</td>
        <td>
          <select name="danhmuc" >
            <?php
             $sql_danhmuc = "SELECT *FROM danhmuc ORDER BY id_danhmuc DESC";
             $sth = $pdo -> query($sql_danhmuc);
            //  $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
             while($row_danhmuc = $sth -> fetch()){
              if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
            ?>
            <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
            <?php
             }else {
              ?>
              <option  value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
             <?php
             }
            }
             ?>
          </select>
        </td> 
    </tr>
    <tr>
        <td>Tình Trạng</td>
        <td>
          <select name="tinhtrang" id="">
            <?php
            if($row['tinhtrang']==1){
            ?>
            <option value="1" selected>Kích hoạt</option>
            <option value="0">Ẩn</option>
            <?php
            }else{
             ?> 
              <option value="1">Kích hoạt</option>
            <option value="0" selected>Ẩn</option>
            <?php
            }
            ?>
          </select>
        </td> 
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="suasanpham" value="cập nhật thông tin"></td>
    </tr>
  </form>
  <?php
}
?>
</table>