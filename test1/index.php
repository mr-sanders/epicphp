<?php 
require ('header.php');

$page = isset($_GET['page']) ? $_GET['page'] : 'index';
switch ($page) {
	case 'blog':
		require ($page.'.php');
		break;
	case 'about':
		require ($page.'.php');
		break;
	default:
		echo "<h2>Кусок контента</h2>";
		break;
}


require ('footer.php');
 ?>