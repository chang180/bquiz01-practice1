<?php
include_once "../base.php";
$db=new DB('total');
$total=$db->find(1);
$total['total']=$_POST['total'];
$db->save($total);

to("../admin.php?do=total");

?>