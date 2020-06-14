<?php
$db=new DB('title');
$ti=$db->find(['sh'=>1]);
?>

<a title="<?=$ti['text'];?>" href="index.php">
			<div class="ti" style="background:url('img/<?=$ti['file'];?>'); background-size:cover;"></div>
			<!--標題-->
		</a>