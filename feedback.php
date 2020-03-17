<?php
	require "config.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EpicLib.ru</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="favicon.ico" type="image/vnd.microsoft.icon" />
</head>
<body>
<div class="wrapper">
			<div id="bar">
				<div id="container">
					<div id="logo"><a href="index.php">EpicLib.ru</a></div>
					<ul id="nav-block">						
						<a href="index.php"><li class="nav_button">Главная</li></a>
						<a href="feedback.php"><li class="nav_button">Обратная связь</li></a>
					</ul>
				</div>
			</div>
		<div class="container_main">
				<div class="col-md-3 col-sm-3 col-xs-12">
					<ul class="navigation font_menu">
																			<div class="search">
 																										<script>
 																					  (function() {
 																					    var cx = '009021294929440464985:grqcs045n4k';
 																					    var gcse = document.createElement('script');
 																					    gcse.type = 'text/javascript';
 																					    gcse.async = true;
 																					    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
 																					    var s = document.getElementsByTagName('script')[0];
 																					    s.parentNode.insertBefore(gcse, s);
 																					  })();
 																					</script>
 																					<gcse:search></gcse:search>
 																			</div>
						<h2 class="center fonts">Популярные книги</h2>
		<br>
			<?php $book = "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 0 , 6";
			$booknet  = mysqli_query($connection , $book);
while ($booker = mysqli_fetch_array($booknet)) {	?>
			<a href="book.php?id=<?php echo $booker['id']; ?>">		<img id="img" class="img" src="image/<?php  echo  $booker['link']?>.jpg"></a><?php	}?>	</ul>
		<br>
				</div>
			<div class="right_block col-md-8 col-sm-8 col-xs-12">
							<div class="button margintop" onclick="history.back();">Назад</div>
					<div class="container_info bookmargin">
				<div class="center font1"><h3>Авторам и Правообладателям</h3></div>
				<div class="container_info">
					<p class="center">Если у вас есть предложения, пожелания или идеи как улучшить сайт<br>
					Прошу обратиться к нам epiclib@gmail.ru .<br>
					Сотрудничество также приветствуется.</p>
				</div>
			</div>
		</div>
	</div>
		<br>
		<div class="footer">
			<div class="footer_main font_menu">
				<div class="center"><h3>Электронная библиотека EpicLib</h3><p>EpicLib-коллекция книг для работы и саморазвития.</p><p><a href="licence.php" class="licence">Авторам и Правообладателям</a></p> <a href="otkaz.php" class="licence">Отказ от ответственности</a></p>
				</div>
			</div>
		</div>
</div>
</body>
</html>
