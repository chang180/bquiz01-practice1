<!-- 第一個彈出式視窗，必須記住怎麼刻出來 -->
<h3 class="cent">新增動畫圖片</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>動畫圖片：</td>
        <td><input type="file" name="file"></td>
    </tr>
</table>
<div class="cent" ><input type="submit" value="新增"><input type="reset" value="重置"></div>
<input type="hidden" name="table" value="mvim">
</form>