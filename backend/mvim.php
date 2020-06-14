				<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">動畫圖片管理</p>
					<form method="post" action="api/edit.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="65%">動畫圖片</td>
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
									<td></td>
								</tr>

								<?php
								$table = $do;
								
								$db = new DB($table);
								$rows = $db->all();

								// $rows=all();
								foreach ($rows as $key => $value) {

								?>
									<tr class="cent">
										<td width="65%"><img src="img/<?= $value['file']; ?>" style="width:150px;height:100px"></td>
										<td width="7%"><input type="checkbox" name="sh[]" value="<?= $value['id']; ?>" <?= ($value['sh'] == 1) ? "checked" : ""; ?>></td>
										<td width="7%"><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
										<td><input type="button" value="更換動畫" onclick="op('#cover','#cvr','modal/update_<?=$table;?>.php?id=<?= $value['id']; ?>&table=<?=$table;?>')"></td>
										<input type="hidden" name='id[]' value="<?= $value['id']; ?>">
									</tr>

								<?php
								}

								?>
							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
								<input type="hidden" name="table" value="<?=$table;?>">
									<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?=$table;?>.php?do=<?=$table;?>')" value="新增動畫圖片"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>