				<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">校園映像資料管理</p>
					<form method="post" action="api/edit.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="65%">校園映像資料圖片</td>
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
									<td></td>
								</tr>

								<?php
								$table = $do;
								$db = new DB($table);

								$total=$db->count('');
								$div=3;
								$pages=ceil($total/$div);
								$now=$_GET['p']??1;
								$start=($now-1)*$div;


								$rows = $db->all([],"limit $start,$div");

								// $rows=all();
								foreach ($rows as $key => $value) {

								?>
									<tr class="cent">
										<td><img src="img/<?= $value['file']; ?>" style="width:103px;height:68px"></td>
										<td><input type="checkbox" name="sh[]" value="<?= $value['id']; ?>" <?= ($value['sh'] == 1) ? "checked" : ""; ?>></td>
										<td><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
										<td><input type="button" value="更換圖片" onclick="op('#cover','#cvr','modal/update_<?=$table;?>.php?id=<?= $value['id']; ?>&table=<?=$table;?>')"></td>
										<input type="hidden" name='id[]' value="<?= $value['id']; ?>">
									</tr>

								<?php
								}

								?>
							</tbody>
						</table>
								<div class="cent">
								<?php 
if(($now-1)>0){
	echo "<a href='admin.php?do=image&p=".($now-1)."' style='font-size:24px';>< </a>";
}

for($i=1;$i<=$pages;$i++){
	$fontsize=($now==$i)?"24px":"20px";
	echo "<a href='admin.php?do=image&p=$i' style='font-size:$fontsize;text-decoration:none' ;>$i </a>";
}
				if(($now)<$pages){
					echo "<a href='admin.php?do=image&p=".($now+1)."' style='font-size:24px';> ></a>";
				}

?>
								</div>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
								<input type="hidden" name="table" value="<?=$table;?>">
									<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?=$table;?>.php?do=<?=$table;?>')" value="新增校園映像圖片"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>