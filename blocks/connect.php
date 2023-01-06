<?php
$mysql=new mysqli('localhost','root','','register-bd');/* меняем имя хоста,
логин,пароль,база данных Mysql на данные значения удаленного сервера.
Для работы с удаленным серверам также требуется домен, например:org,by,com
и тд.*/
$select_db=mysqli_select_db($mysql,'register-bd');
 ?>
