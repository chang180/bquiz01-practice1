<h3 class="cent">更新動畫圖片</h3>
<hr>
<form action="api/update.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>動畫圖片：</td>
        <td><input type="file" name="file"></td>
    </tr>
</table>
<input type="hidden" name="table" value="<?=$_GET['table'];?>">
<input type="hidden" name="id" value="<?=$_GET['id'];?>">
<div class="cent" ><input type="submit" value="更新"><input type="reset" value="重置"></div>
</form>