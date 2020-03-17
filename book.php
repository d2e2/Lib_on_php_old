<?php
	require "config.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $config['title']; ?></title>
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
			<a href="book.php?id=<?php echo $booker['id']; ?>">		<img id="img" class="img" src="image/<?php  echo  $booker['link']?>.jpg"></a>	<?php	}?>	</ul>
		<br>
				</div>
		<?php
		$article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
		if (mysqli_num_rows($article) <= 0) 
		{
		 ?>
			<div class="right_block col-md-8 col-sm-8 col-xs-12">
				<div class="button" onclick="history.back();">Назад</div>
					<div class="container_info">
		<div class="textmin ">
	<hr>
	<br>
	<h3 class="center">ВЫБРАННЫЙ ВАМИ ЗАПРОС НЕ НАЙДЕН !</h3>
	<hr>
		</div>
				</div>
			</div>
			</div>
		<?php
		} else  {
			$art = mysqli_fetch_assoc($article);
			mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id'] );
			?>
			<div class="right_block col-md-8 col-sm-8 col-xs-12">
				<div class="button margintop" onclick="history.back();">Назад</div>
					<div class="container_info bookmargin">
				<img id="img" class="img" src="image/<?php echo $art['link'];?>.jpg">
					<div class="content_book">
					<div class="block_text">
					<p class="right">Просмотров: <?php echo $art['views'];?></p>
					<h4><?php  echo  $art['title']?></h4>
					<hr>
						<p>Оригинальное название: <?php echo $art['origname']; ?></p>
						<p>Авторы:<?php echo $art['author'];	?></p>
						<p>Первая публикация: <?php echo $art['firstpub'];?> г.</p>
						<p>Язык: <?php echo $art['lang'];?></p>
						<p>Скачать бесплатно</p>					
						<a href="bookload/<?php echo $art['link']?>.fb2"download><button>Скачать</button></a>
						<i>|</i>fb2
						<br>
						<a href="bookload/<?php echo $art['link']?>.epub"download><button>Скачать</button></a>
						<i>|</i>ePub	
					</div>
					</div>
							<div class="textmin">
	<h3 class="center formbook padding">От издателя</h3>
	<p><?php echo $art['text']?></p>
		</div>
		<div class="textmin ">
	<hr>
	<br>
	<h3 class="center">Случайный комментарий из сети</h3>
	<hr><p><?php echo $art['comment']?></p>
		</div>
				</div>
			</div>
		</div>
	<?php
		}
	?>
		<br>
		<div class="footer">
			<div class="footer_main font_menu">
				<div class="center"><h3>Электронная библиотека EpicLib</h3><p>EpicLib-коллекция книг для работы и саморазвития.</p><p><a href="licence.php" class="licence">Авторам и Правообладателям</a>	<br>
				<a href="otkaz.php" class="licence">Отказ от ответственности</a></p>
				</div>
			</div>
		</div>
</div>
</body>
</html>
