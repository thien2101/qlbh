<?php
include('../../connect/config.php');
if(isset($_GET['code'])){
    $code_cart = $_GET['code'];
    $sql_update = "UPDATE cart SET cart_status=0 WHERE code_cart='".$code_cart."'";
    $query = $pdo -> query($sql_update);
    // $query =mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlydonhang&query=lietke');
}
?>    