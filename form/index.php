<?php 
header('Content-type: text/html; charset=utf-8'); 
session_start();
	if(isset($_COOKIE['count'])){
		$count = $_COOKIE['count'] + 1;
	} else {
		$count = 1;
	}
	setcookie('count', $count, time() + 5);
	echo $count;
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.wrapper{
			width: 500px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div class="wrapper">

		<?php
			require 'tpl/form.html'; 
		?>
		<?php 
			if ($_GET['action'] == 'logout') {
				unset($_SESSION['length']);
				unset($_SESSION['postlist']);
			}
		 ?>
		<?php 
			if (!isset($_SESSION['postlist'])) {
				$_SESSION['length'] = 0;
			}
		 ?>
		<?php if($_POST['posttitle']){
			$l = $_SESSION['length'];
			$_SESSION['postlist'][$l]['title'] = $_POST['posttitle'];
			$_SESSION['postlist'][$l]['text'] = $_POST['posttext'];
			$_SESSION['length']++;
		} ?>
		<?php if (isset($_SESSION['postlist'])): ?>
			<div class="postlist">
				<?php echo session_id()." - ".session_name() ?>
				<?php foreach ($_SESSION['postlist'] as $post): ?>
					<div class="post">
						<h2><?php echo $post['title'] ?></h2>
						<p><?php echo $post['text'] ?></p>
					</div>
				<?php endforeach ?>
			</div>
		<?php endif ?>
	</div>
</body>
</html>