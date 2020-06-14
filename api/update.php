<?php
include_once "../base.php";

$table=$_POST['table'];
$db= new DB($table);

if(!empty($_FILES['file']['tmp_name'])){
    $data=$db->find($_POST['id']);
    $data['file']=$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"../img/".$data['file']);
    $db->save($data);
}



    to("../admin.php?do=$table");
    ?>
