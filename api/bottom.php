<?php
include_once "../base.php";
$db=new DB('bottom');
$bottom=$db->find(1);
$bottom['bottom']=$_POST['bottom'];
$db->save($bottom);

to("../admin.php?do=bottom");

?>