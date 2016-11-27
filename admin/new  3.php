<?php
	 $hostname = 'localhost';
   $username = 'root';
   $passwordname = '';
   $basename = 'phpstart';

   $sql = "SELECT * FROM `users`";
   $result = $conn->query($sql); 
   // В цикле перебираем все записи таблицы и выводим их
   while ($row = $result->fetch_assoc())
   {
       // Оператором echo выводим на экран поля таблицы name_blog и text_blog
       echo 'Название блога: '.$row['login'];
       echo 'Текст блога: '.$row['pass'];
   }   
          ?>   