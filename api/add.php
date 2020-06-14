<?php
include_once "../base.php";

$table=$_POST['table'];
$db= new DB($table);
// $data=[];

if(!empty($_FILES['file']['tmp_name'])){
    $data['file']=$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"../img/".$data['file']);
}

// 不要特別設定空值，會造成其他功能無法運作
// else $data['file']='';



// 接著要用switch case判斷title,admin,menu三種不同的狀況
// 記不住的話直接就用if elseif一個一個往下做，也慢不了多少


if ($table=='title'){
    $data['text']=$_POST['text']??'';
    $data['sh']=0;
}elseif($table=='admin'){
    $data['acc']=$_POST['acc'];
    $data['pw']=$_POST['pw'];
    }
elseif($table=='menu'){
    $data['text']=$_POST['text'];
    $data['href']=$_POST['href'];
    $data['sh']=1;

}else{
    $data['text']=$_POST['text'];
    $data['sh']=1;
    }
// echo $table;
    // var_dump($data);
    $db->save($data);
    to("../admin.php?do=$table");

    ?>
