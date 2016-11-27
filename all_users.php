<?php
          //    вся процедура работает на сессиях. Именно в ней хранятся данные пользователя,    пока он находится на сайте. Очень важно запустить их в самом начале    странички!!!
          session_start();
 include ("db_connect.php");// файл bd.php должен быть в той же папке, что и все    остальные, если это не так, то просто измените путь 
 if (!empty($_SESSION['login']) and    !empty($_SESSION['password']))
            {
            //если    существует логин и пароль в сессиях, то проверяем, действительны ли они

            $login = $_SESSION['login'];
            $password = $_SESSION['password'];
            $result2 = mysql_query("SELECT id FROM    users WHERE login='$login' AND password='$password'",$db); 
            $myrow2 = mysql_fetch_array($result2); 
            if (empty($myrow2['id']))
               {
               //если данные    пользователя не верны
                exit("Вход на эту страницу разрешен    только зарегистрированным пользователям!");
               }
            }
            else {
            //Проверяем,    зарегистрирован ли вошедший
            exit("Вход на эту    страницу разрешен только зарегистрированным пользователям!"); }
            ?>
      <html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="designer" content="Juergen Koller - http://www.lernvid.com" />
<meta name="licence" content="Copywright LernVid.com - Creative Commons Sharalike 3.0" />
	<title>Список пользователей</title>
	<link rel='stylesheet' type='text/css' href='css/style.css' />
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='js/hashchange.js'></script>
    <script type='text/javascript' src='js/dynamicpage.js'></script>
</head>
<body>
	<div id="logo">
		<h1>Ajax Template</h1>
	</div>		
	<div id="wrapper">
        <div id="header">
			<div id="navi">
				<ul class="links">
					<li><a href="http://phpform.com/index.html">Home</a></li>
					<li><a href="http://phpform.com/news.html">News</a></li>
					<li><a href="http://phpform.com/downloads.html">Downloads</a></li>
					<li><a href="http://phpform.com/team.html">Team</a></li>
					<li><a href="http://phpform.com/contact.html">Contact</a></li>
				</ul>
			</div>
		</div>
		<div id="content">
            <h2>Список    пользователей</h2>
  
 <?php
            //выводим    меню
            print <<<HERE
            |<a    href='page.php?id=$_SESSION[id]'>Моя страница</a>|<a    href='index.php'>Главная страница</a>|<a    href='all_users.php'>Список пользователей</a>|<a    href='exit.php'>Выход</a><br><br>
HERE;
 $result = mysql_query("SELECT id,login,avatar FROM users ORDER BY login",$db); //извлекаем логин и идентификатор пользователей 
            $myrow = mysql_fetch_array($result);
            do
            {
            //выводим их в цикле 
            printf("<span class='title'><a href='page.php?id=%s'><img alt='ava' src='%s'></a><em>%s</br>
</em></span>",$myrow[id],$myrow[avatar],$myrow['login'],$myrow[country],$myrow[country]);
}
            while($myrow = mysql_fetch_array($result));
 ?>
          </div>
	</div>
	<div id="footer">
		<div id="footerlinks">
			<a href="imprint.html">Imprint</a>
		</div>
		<!-- It's NOT allowed to delete the Backlink to the autor! >>> Infos under: http://lernvid.com/lizenz <<< -->
		Design by <a  title="Templates" href="http://www.lernvid.com">LernVid.com</a>
	</div>
</body>
</html>