<!-- ad是第二個檔，從title.php拷貝過來，此時應該要已經沒有需要改動的title變數才是對的 -->

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">管理者帳號管理</p>
					<form method="post" action="api/edit.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="30%">帳號</td>
									<td width="30%">密碼</td>
									<td width="7%">刪除</td>
								</tr>

								<?php
								$table = $do;
								
								$db = new DB($table);
								$rows = $db->all();

								foreach ($rows as $key => $value) {

								?>
									<tr class="cent">
										<td><input type="text" name="acc[]" value="<?= $value['acc']; ?>"></td>
										<td><input type="password" name="pw[]" value="<?= $value['pw'];?>"></td>
										<td><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
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
									<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?=$table;?>.php?do=<?=$table;?>')" value="新增管理者帳號"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>