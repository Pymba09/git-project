<?php 
          // вся процедура работает на сессиях. Именно в ней хранятся    данные пользователя, пока он находится на сайте. Очень важно запустить их в    самом начале странички!!!
          session_start();          
include ("db_connect.php");// файл bd.php должен быть в той же папке, что и    все остальные, если это не так, то просто измените путь           
if    (!empty($_SESSION['login']) and !empty($_SESSION['password']))
            {
            //если существует логин и пароль в сессиях, то проверяем их и    извлекаем аватар

            $login    = $_SESSION['login'];
            $password    = $_SESSION['password'];
            $result    = mysql_query("SELECT id,avatar FROM users WHERE login='$login' AND    password='$password'",$db); 
            $myrow    = mysql_fetch_array($result);

            //извлекаем нужные данные о пользователе
            }
            ?>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="designer" content="Juergen Koller - http://www.lernvid.com" />
<meta name="licence" content="Copywright LernVid.com - Creative Commons Sharalike 3.0" />
	<title>Ajax Template</title>
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
					<li><a href="index.html">Home</a></li>
					<li><a href="news.html">News</a></li>
					<li><a href="downloads.html">Downloads</a></li>
					<li><a href="team.html">Team</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</div>
		</div>
		<div id="content">
<?php
            if    (!isset($myrow['avatar']) or $myrow['avatar']=='') {
?>
        
            <form    action="testreg.php" method="post">
            <!-- testreg.php - это адрес обработчика. То есть, после нажатия на кнопку    "Войти", данные из полей отправятся на страничку testreg.php методом "post"  -->
              <p>
                <label>Ваш логин:<br></label>
                <input    name="login" type="text" size="15"    maxlength="15"
           <?php         
         
            if (isset($_COOKIE['login'])) //есть    ли переменная с логином в COOKIE. Должна быть,    если пользователь при предыдущем входе нажал на чекбокс "Запомнить    меня" 
            {
            //если да, то вставляем в форму ее значение. При этом    пользователю отображается, что его логин уже вписан в нужную графу
            echo    ' value="'.$_COOKIE['login'].'">';
            }          
 ?>


              </p>
            <!-- В текстовое поле (name="login" type="text") пользователь вводит свой    логин -->  
              <p>
                <label>Ваш пароль:<br></label>
                <input    name="password" type="password" size="15"    maxlength="15"
<?php
         
            if (isset($_COOKIE['password']))//есть    ли переменная с паролем в COOKIE. Должна быть,    если пользователь при предыдущем входе нажал на чекбокс "Запомнить    меня" 
            {
            //если да, то вставляем в форму ее значение. При этом пользователю    отображается, что его пароль уже вписан в нужную графу
            echo    ' value="'.$_COOKIE['password'].'">';
            }

              ?>       
           
              </p>
            <!-- В поле для паролей (name="password"    type="password") пользователь вводит свой пароль -->  
              <p>
                <input name="save" type="checkbox"    value='1'> Запомнить меня.
              </p>          
<p>
            <input    type="submit" name="submit" value="Войти">
            <!-- Кнопочка (type="submit") отправляет данные на страничку testreg.php     --> 
            <br>

            <!-- ссылка на регистрацию, ведь как-то же должны гости    туда попадать  --> 
            <a href="reg.php">Зарегистрироваться</a> 
            </p></form>
            <br>
            Вы    вошли на сайт, как гость<br>
        <?php
            }          
else {
$role = $myrow['role'];
	  if ($role == 2) {
	  echo '<meta http-equiv="refresh" content="0;URL=http://phpstart.com/admin/">';
	  	 exit;
	  }
	  else {
          echo "Вы    вошли на сайт, как ".$_SESSION[login]." (<a    href='exit.php'>выход</a>)<br>
           |<a    href='page.php?id=$_SESSION[id]'>Моя страница</a>|<a    href='index.php'>Главная страница</a>|<a    href='all_users.php'>Список пользователей</a>|<a    href='exit.php'>Выход</a><br><br>

            Ваш    аватар:<br>
            <img    alt='$_SESSION[login]' src='$myrow[avatar]'>";
            
            }          
			}
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