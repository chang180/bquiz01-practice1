<!-- 第一個彈出式視窗，必須記住怎麼刻出來 -->
<h3 class="cent">新增動態廣告文字</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>動態文字廣告：</td>
        <td><input type="text" name="text"></td>
    </tr>
</table>
<div class="cent" ><input type="submit" value="新增"><input type="reset" value="重置"></div>
<input type="hidden" name="table" value="ad">
</form>