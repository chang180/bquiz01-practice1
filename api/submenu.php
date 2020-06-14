<?php
include_once "../base.php";

$table = $_POST['table'];
$db = new DB($table);

if(!empty($_POST['id'])){

    foreach ($_POST['id'] as $key => $id) {
        if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
            $db->del($id);
        } else {
            $row = $db->find($id);
            $row['text'] = $_POST['text'][$key];
            $row['href'] = $_POST['href'][$key];
            
            $db->save($row);
        }
    }
}
if (!empty($_POST['text2'])) {
    foreach ($_POST['text2'] as $key => $value) {

        if (!empty($value)) {
            $data2['text'] = $value;
            $data2['href'] = $_POST['href2'][$key];
            $data2['sh']=1;
            $data2['parent'] = $_POST['parent'];
            // var_dump($data2);
            $db->save($data2); 
        }
    }
}


    to("../admin.php?do=$table");
