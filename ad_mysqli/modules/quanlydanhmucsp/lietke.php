<?php
$sql_lietke_danhmucsp = "SELECT * FROM danhmuc ORDER BY thutu DESC ";
$sth = $pdo -> query($sql_lietke_danhmucsp);
// $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);

?>
<p>liệt kê sản phẩm</p>
<table class="table-lk" border="1" style="border-collapse:collapse; width :100%;">
  <tr>
    <th>id</th>
    <th>Hình ảnh</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row = $sth -> fetch()){
    $i++;
    ?>
    <tr>

    <td><?php echo $i ?></td>
    <td><img src="modules/quanlydanhmucsp/upload/<?php echo $row['hinhanhdm'] ?>" width="200px" height="250px"></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td>
        <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc']?>">Xóa</a> | <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>">Sửa</a>
    </td>
  </tr>
  <?php
  }
  ?>
  

</table> 

