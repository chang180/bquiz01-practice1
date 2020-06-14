<?php include_once "base.php"; ?>
<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
	<?php
    $db=new DB('ad');
    $ad=$db->all(['sh'=>1]);
    foreach($ad as $value){
        echo $value['text']."　　";
    }
    ?>
	</marquee>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<?php
	$db = new DB('news');

	$total = $db->count('');
	$div = 5;
	$pages = ceil($total / $div);
	$now = $_GET['p'] ?? 1;
	$start = ($now - 1) * $div;
?>
	<h3>更多最新消息顯示區</h3>
	<hr>
	<ol class="ssaa" style="list-style-type:decimal;" start="<?= $start + 1; ?>">
<?php
	$rows = $db->all(['sh' => 1], "limit $start,$div");
	foreach ($rows as $key => $value) {
		echo "<li class='sswww'>";
		echo  mb_substr($value['text'], 0, 20, "utf8");
		echo "<span style='display:none' class='all'>" . $value['text'] . "</span>";
		echo "...</li>";
	}

	?>
	</ol>

	<div class="cent">
		<?php


		if (($now - 1) > 0) {
			echo "<a href='index.php?do=news&p=" . ($now - 1) . "' style='font-size:24px';>< </a>";
		}

		for ($i = 1; $i <= $pages; $i++) {
			$fontsize = ($now == $i) ? "24px" : "20px";
			echo "<a href='index.php?do=news&p=$i' style='font-size:$fontsize;text-decoration:none' ;>$i </a>";
		}
		if (($now) < $pages) {
			echo "<a href='index.php?do=news&p=" . ($now + 1) . "' style='font-size:24px';> ></a>";
		}

		?>
	</div>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>