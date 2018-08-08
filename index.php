<?php
session_start();
include 'config.php';
// print_r($_SERVER);
// $c = curl_init('http://prices/change');
// echo "$_SERVER['PHP_SELF']";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Каталог цен</title>
</head>
<body>	
	<?php if (isset($_POST['myform1'])) {?>

    <form name="graf" action="<?=$_SERVER["PHP_SELF"]?>" method="get">
        <p>
        	<?php $date = $_POST['date']; ?>
            Список актуальных цен на <?=$date?>: 
                <table border ="1">
                <tr>
                    <th>Наименование</th> 
                    <th>Цена</th>
                </tr>
                    	
                <?php 
                //print_r($_POST);
                // $date = $_POST['date'];

                //здесь нужно еще доделать!!
    			//в случае возврвта пустой строки для товара, нужно вытянуть значение базовой цены него из таблицы `prod`
                if ($_POST['ver'] = 'Per') 
                	{$query = "SELECT * FROM (SELECT * FROM `variants` WHERE '$date' BETWEEN `period_from` AND `period_to`  ORDER BY (`period_to` - `period_from`) ) AS mt GROUP BY `title`"; 
            	}elseif ($_POST['ver'] = 'Sort') {$query = "SELECT * FROM (SELECT * FROM `variants` WHERE '$date' BETWEEN `period_from` AND `period_to`  ORDER BY `period_from` DESC) AS mt_1 GROUP BY `title`";}

    			$res = $connection->query($query);
    			//$query->execute();
    			//$row = $query->fetch(); 
    			$table = [];
				while (($row = $res->fetch_assoc()) != false) {
    			$table[] = $row;
				}
				//print_r($table);
                $count = count($table);
                
                for ($i=0; $i < $count; $i++) { 
                    //$mas = $table[$i]; ?>

                <tr>
                    <th><a href="change.php?param=<?=$table[$i]['title']?>"><?=$table[$i]['title']?></a></th> 
                    <th><?=$table[$i]['price']?></th><?php $_SESSION['t']=$table[$i]['title'] ?>
                </tr>
                <?php   } ?>
                     	
                    </table>     
        </p>

        <div>
            <input type="submit" name="graf" value="Вывести графики цен">
        </div>
    </form>

	<?php } elseif (isset($_GET['graf'])) {?>
<!-- 		//при нажатти на кнопку происходит расчет координат и заполение таблиц graf_1 и graf_2
		$mas_date_1 = [];

		$query = "SELECT * FROM (SELECT * FROM `variants` WHERE '$date' BETWEEN `period_from` AND `period_to`  ORDER BY (`period_to` - `period_from`) ) AS mt GROUP BY `title`";
		$res = $connection->query($query); 
    	$table_11 = [];
		while (($row = $res->fetch_assoc()) != false) {
    	$table_11[] = $row;
				}
        $count = count($table);
                
        for ($i=0; $i < $count; $i++) { 
                    //$mas = $table[$i]; --> 


	<?php } else {?>

    <form name="myform" action="<?=$_SERVER["PHP_SELF"]?>" method="post">
    	<p>
    		Выберите способ определения цены
    	</p>
        <select name="ver">
            <option value="Per">Приоритетнее цена с меньшим периодом действия (цена на 1 месяц приоритетнее цены установленной на 1 год)</option>
            <option value="Sort">Приоритетнее цена, установленная позднее (используя сортировку)</option>
        </select>
        <p>
            На дату: <input type="date" name="date">
        </p>
        <div>
            <input type="submit" name="myform1" value="Вывести актуальные цены">
        </div>
    </form>
	<?php }
	// session_;
	?>
</body>
</html>