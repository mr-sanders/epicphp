<?php 
	header('Content-type: text/html; charset=utf-8'); 
	$students[0] = array(
		"name" => "Ekaterina",
		"last name" => "Miroshnik",
		"hometown" => "Saint Petersburg",
		"email" => "undefined(",
		"id" => "make_me_loco",
		"interests" => array("photo","video","design") 
	);
	$students[1] = array(
		"name" => "Roman",
		"last name" => "Volkov",
		"hometown" => "Krasnokamensk",
		"email" => "hidden(",
		"id" => "v_lk_v",
		"interests" => array("php","frontend","fitness") 
	);
	$students[2] = array(
		"name" => "Kirill",
		"last name" => "Afonin",
		"hometown" => "Saint Petersburg",
		"email" => "undefined(",
		"id" => "ka",
		"interests" => array("backend","frontend","something") 
	);
	// $count = 0;
	// for($i=0; $i<2; $i++){
	// 	for($j=0; $j<2; $j++){ 
	// 		$pages[$i][$j] = ($students[$count++]);
	// 	}
	// }
	
	function cmp($a, $b){
		return strnatcmp($a["last name"], $b["last name"]);
	}
	$page = 0;
	$pos = 0;
	while($pages[$page] = array_slice(&$students, $pos, 2)){
		$page++;
		$pos+=2;
	}
	// foreach ($pages as $page => $item) {
	// 	foreach($item as $student){
	// 		foreach($student as $arg => $value){
	// 			echo "$arg => $value <br>";
	// 		}
	// 	}
	// }
	
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<style>
 		.wrapper{
			text-align: center;
 		}
 		.pagi{
 			clear: both;
 		}
 		.student{
 			text-align: left;
 			display: inline-block;
 		}
 	</style>
 </head>
 <body>
 	<div class="wrapper">
 	<?php shuffle(&$students); 
 		usort(&$students, "cmp");?>
 	<div class="pagi">
	 	<?php foreach ($pages as $page => $value): ?>
	 		<a href="./?page=<?php echo $page ?>">[<?php echo $page ?>]</a>
	 	<?php endforeach ?>
 	</div>
 	<?php $current = isset($_GET['page']) ? $_GET['page'] : 0 ?>
 	<?php foreach ($pages[$current] as $student): ?>
	 	<div class="student">
	 		<h3>Студент <?php echo $number ?></h3>
	 		<ul>
				<?php foreach ($student as $key => &$value): ?>
						<li>	
							<?php if(is_array($value)): ?>
								<?php echo $key ?>
								<ul>
									<?php
									foreach ($value as $item) {
										echo "<li>".$item."</li>";
									} ?>
								</ul>
							<?php else : ?>
								<?php echo($key." - ".$value) ?>
							<?php endif ?>
						</li>
				<?php endforeach ?>
 			</ul>
 		</div>
		<a href="./?page=3"></a>
 	<?php endforeach ?>
	</div>
 </body>
 </html>
