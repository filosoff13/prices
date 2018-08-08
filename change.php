<?php
// session_start();
include 'config.php'; 
// $title = (isset($_GET['param'])) ? $_GET['param'] : $title;
// global $title;
$title = $_GET['param'];
// $_SESSION['param'] = $title;
// print_r($_SESSION);
// print_r($_SERVER);
// $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo "$_SERVER[HTTP_HOST]";
// echo $_SERVER['QUERY_STRING'];
// echo $_SERVER['REQUEST_URI'];

// print_r($_SERVER[argv]);
 // require_once 'get.php';
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css"></style>
	<meta charset="utf-8">
	<title>Изменение цены</title>
</head>
<body style="background-color: green">
	<?php
	if (isset($_POST['ch'])) { 
		
		//заменяем не заполенные значения
		$price = (isset($_POST['price'])) ? $_POST['price'] : '0';
		$from = (isset($_POST['period_from'])&&$_POST['period_from']!=='') ? $_POST['period_from'] : date("Y-m-d", strtotime("1980-01-01"));
		$to = (isset($_POST['period_to'])&&$_POST['period_to']!=='') ? $_POST['period_to'] : date("Y-m-d", strtotime("3999-12-31"));
		$title = (isset($_POST['title']))? $_POST['title']: 'no title';
		// $title = $_SESSION['param'];

		//находим id
		$query = "SELECT `id` FROM `prod` WHERE `title`='$title'";
        $res = $connection->query($query);

        $table_1 = [];
		while (($row = $res->fetch_assoc()) != false) {
    	$table_1[] = $row;}
    	$title_id = $table_1[0]['id'];

    	$query = "INSERT INTO `variants`(`title_id`, `title`, `price`, `period_from`, `period_to`) VALUES ('$title_id', '$title', '$price', '$from', '$to')";

    	$res = $connection->query($query);
    			//$query->execute();
    			//$row = $query->fetch(); 
    	$table = [];
		$row = $res->fetch_assoc();
		// header('Refresh: 100; URL=http://prices/index.php');
		//header('REQUEST_URI=/index.php');
		} else {?>
    <form name="ch" action="<?=$_SERVER["PHP_SELF"]?>" method="post" onsubmit="window.open('/index.php','_blank'); return true">
      <p>
          Введите новые данные по :
      </p> 
      <p>
          Товар: <input type="label" name="title" value="<?=$title?>">
      </p>
      <p>
          Цена: <input type="text" name="price">
      </p>
      <p>
          Период с: <input type="date" name="period_from">
      </p>  
      <p>
          Период по: <input type="date" name="period_to">
      </p>
      <div>
           <!-- <input type="button" name="ch" value="Обновить цену" onClick='location.href="/index.php"'> -->
           <input type="submit" name="ch" value="Обновить цену" onClick='location.href="/index.php"'>
      </div>
    </form>
    <?php }?>

</body>
</html>
