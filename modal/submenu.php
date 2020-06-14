<h3 class="cent">編輯次選單</h3>
<hr>
<?php
include_once "../base.php";
$table = $_GET['table'];
$db = new DB($table);
$id = $_GET['id'];

$subs = $db->all(["parent" => $id]);



?>

<form action="api/submenu.php" method="post" enctype="multipart/form-data">
    <table id="submenu">
        <tr>
            <td>次選單名稱</td>
            <td>選單連結網址：</td>
            <td>刪除</td>
        </tr>
        <?php
        foreach ($subs as $key => $value) {


        ?>
            <tr>
                <td><input type="text" name="text[]" value="<?= $value['text']; ?>"></td>
                <td><input type="text" name="href[]" value="<?= $value['href']; ?>"></td>
                <td><input type="checkbox" name="del[]" value="<?= $value['id']; ?>""></td>
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
            </tr>
            <?php
        }
        ?>


</table>
<div class=" cent">
    <input type="submit" value="修改確定">
    <input type="reset" value="重置">
    <input type="button" value="更多次選單" onclick="moresub()">
</div>
<input type="hidden" name="table" value="menu">
<input type="hidden" name="parent" value="<?=$id;?>">
</form>

<script>
    function moresub() {
        let row = `
<tr>
        <td><input type="text" name="text2[]"></td>
        <td><input type="text" name="href2[]"></td>
        <td></td>
    </tr>
`;
        $("#submenu").append(row);

    }
</script>