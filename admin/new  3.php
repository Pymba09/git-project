<?php
	 $hostname = 'localhost';
   $username = 'root';
   $passwordname = '';
   $basename = 'phpstart';

   $sql = "SELECT * FROM `users`";
   $result = $conn->query($sql); 
   // � ����� ���������� ��� ������ ������� � ������� ��
   while ($row = $result->fetch_assoc())
   {
       // ���������� echo ������� �� ����� ���� ������� name_blog � text_blog
       echo '�������� �����: '.$row['login'];
       echo '����� �����: '.$row['pass'];
   }   
          ?>   