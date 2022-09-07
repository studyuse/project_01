<?php
require 'conn.php';
$stu_no = $_GET['stu_no'];
// echo $stu_no;
$sql = "DELETE from stu where stu_no = '$stu_no'";
$result = $pdo->exec($sql);
if($result > 0) {
    header("location:index.php");
} else {
    die("删除失败");
}
?>