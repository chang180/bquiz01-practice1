<!-- 要考慮的部份很多，想好再開始做 -->
<?php
include_once "../base.php";
$table = $_POST['table'];
$db = new DB($table);


foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $db->del($id);
    } else {
        $row = $db->find($id);
        switch ($table) {
            case "title":
                //                 var_dump($id);
                // var_dump($_POST['text']);
                // var_dump($row);
                $row['text'] = $_POST['text'][$key];
                // var_dump($_POST['sh']);
                $row['sh']=($_POST['sh']==$id)?1:0;
            break;
            case "admin":
                $row['acc']=$_POST['acc'][$key];
                $row['pw']=$_POST['pw'][$key];
            break;
            case "menu":
                $row['text']=$_POST['text'][$key];
                $row['href']=$_POST['href'][$key];
                // 旁門左道，但可加速完成解題，因為這個條件很麻煩，連順序都不能錯，不如硬幹
                // @$row['sh']=(in_array($id,$_POST['sh']))?1:0;
                $row['sh']=(!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                // $row['sh'] = (!empty($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;

            break;
            default:
            @$row['text']=$_POST['text'][$key];
            $row['sh']=(!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;

        break;
        }
        $db->save($row);
    }
}
to("../admin.php?do=$table");


?>