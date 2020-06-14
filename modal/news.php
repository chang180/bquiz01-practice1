<!-- 第一個彈出式視窗，必須記住怎麼刻出來 -->
<h3 class="cent">新增最新消息資料</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>最新消息資料：</td>
        <td><textarea name="text" cols="60" rows="5"></textarea></td>
    </tr>
</table>
<div class="cent" ><input type="submit" value="新增"><input type="reset" value="重置"></div>
<input type="hidden" name="table" value="news">
</form>