<?php include_once "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">

	<!-- js的連結順序都不能錯，否則js.js要用的功能會不正常 -->
	<script src="./js/jquery-3.4.1.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<div id="main">
		<?php include "header.php"; ?>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">主選單區</span>

					<!-- 主選單區很複雜，但程式碼並不長，搞不清楚就硬記下來吧 -->
					<?php
                    $menu = new DB("menu");
                    $mains = $menu->all(['parent' => 0, 'sh' => 1]);
                    foreach ($mains as $main) {
                        echo "<div class ='mainmu'>";
                        echo "<a href='" . $main['href'] . "'>";
                        echo $main['text'];
                        echo "</a>";

                        $chksub = $menu->count(['parent' => $main['id']]);
                        if ($chksub > 0) {
                            $subs = $menu->all(['parent' => $main['id']]);
                            echo "<div class='mw' style='display:none'>";
                            foreach ($subs as $sub) {
                                echo "<div class='mainmu2'><a href='" . $sub['href'] . "'>" . $sub['text'] . "</a></div>";
                            }
                            echo "</div>";
                        }
                        echo "</div>";
                    }

                    ?>
					





				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 :
						<?php
						$db = new DB('total');
						$total = $db->find(1);
						echo $total['total'];
						?>
					</span>
				</div>
			</div>
			<!-- 挖掉的部份要include回來，並做判斷 -->
			<?php
			$do = $_GET['do'] ?? "home";
			$file = "./front/" . $do . ".php";
			include file_exists($file) ? $file : "front/home.php";
			// include "front/home.php"; 
			?>

			<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
			<script>
				$(".sswww").hover(
					function() {
						$("#alt").html("" + $(this).children(".all").html() + "").css({
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
			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
				<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('?do=login')">管理登入</button>
				<div style="width:89%; height:480px;" class="dbor cent">
					<span class="t botli">校園映象區</span>
					<div><img src="icon/up.jpg" onclick="pp(1)"> </div>
					<?php
					$db = new DB('image');
					$imgs = $db->all(['sh' => 1]);
					foreach ($imgs as $key => $value) {
						echo "<div class='im' id='ssaa$key'>";
						echo "<img src='img/" . $value['file'] . "' style='width:150px;height:103px;'>";

						echo "</div>";
					}

					?>
					<div><img src="icon/dn.jpg" onclick="pp(2)"> </div>

					<script>
						var nowpage = 0,
							num = <?= $db->count(['sh' => 1]); ?>;

						function pp(x) {
							var s, t;
							if (x == 1 && nowpage - 1 >= 0) {
								nowpage--;
							}
							if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) {
								nowpage++;
							}
							$(".im").hide()
							for (s = 0; s <= 2; s++) {
								t = s * 1 + nowpage * 1;
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<?php include "footer.php"; ?>
	</div>

</body>

</html>