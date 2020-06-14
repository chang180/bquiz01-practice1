				<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">網站標題管理</p>
					<!-- 此時就要想好是哪些功能會跳到edit.php，而不是一個一個做，因為重覆性很高 -->
					<form method="post" action="api/edit.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="45%">網站標題</td>
									<td width="23%">替代文字</td>
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
									<td></td>
								</tr>

								<?php
								// base裏的$table變數就是為此設定的
								// 同時在此用上一頁的變數$do把要查的表格名稱指定給$table
								$table = $do;
								
								// 用物件的方式使用共同函式
								$db = new DB($table);
								$rows = $db->all();

								// $rows=all();
								foreach ($rows as $key => $value) {

								?>
									<tr class="cent">
										<td width="45%"><img src="img/<?= $value['file']; ?>" style="width:300px;height:30px"></td>
										<td width="23%"><input type="text" name="text[]" value="<?= $value['text']; ?>"></td>
										<td width="7%"><input type="radio" name="sh" value="<?= $value['id']; ?>" <?= ($value['sh'] == 1) ? "checked" : ""; ?>></td>
										<td width="7%"><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
										<td><input type="button" value="更新圖片" onclick="op('#cover','#cvr','modal/update_<?=$table;?>.php?id=<?= $value['id']; ?>&table=<?=$table;?>')"></td>
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
									<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?=$table;?>.php?do=<?=$table;?>')" value="新增網站標題圖片"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>