<?php 
$table = $do;

$db = new DB($table);
$tt = $db->find(1);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">進站總人數管理</p>
					<form method="post" action="api/total.php">
						<table width="100%">
							<tbody>
								<tr>
									<td style="background:yellow;text-align:right;" width="50%">進站總人數：</td>
									<td width="50%"><input type="number" name="total" value="<?=$tt['total'];?>"></td>
								</tr>

								
							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
								<input type="hidden" name="table" value="<?=$table;?>">
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>