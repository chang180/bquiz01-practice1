<!-- ad是第二個檔，從title.php拷貝過來，此時應該要已經沒有需要改動的title變數才是對的 -->

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">選單管理</p>
					<form method="post" action="api/edit.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="30%">主選單名稱</td>
									<td width="30%">選單連結網址</td>
									<td width="7%">次選單數</td>
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
									<td width="7%"></td>
								</tr>

								<?php
								$table = $do;
								
								$db = new DB($table);
								$rows = $db->all(['parent'=>0]);

								foreach ($rows as $key => $value) {

								?>
									<tr class="cent">
										<td><input type="text" name="text[]" value="<?= $value['text']; ?>"></td>
										<td><input type="text" name="href[]" value="<?= $value['href'];?>"></td>
										<td><?=$db->count(["parent"=>$value['id']]);?></td>
										<td><input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh']==1)?'checked':'';?>></td>
										<td><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
<td><input type="button" onclick="op('#cover','#cvr','modal/sub<?=$table;?>.php?id=<?=$value['id'];?>&table=<?=$table;?>')" value="編輯次選單"></td>
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
									<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?=$table;?>.php?do=<?=$table;?>')" value="新增主選單"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>