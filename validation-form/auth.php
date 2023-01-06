<?php
/* берем данные из check.php*/
$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING);
$pass = md5($pass."sol_фыв123");/*кеширование пароля методом соль,производится
сравнения пароля и кеша(пароль и кеш должен быть одинаковый при
регистрации и авторизации).*/

$mysql=new mysqli('localhost','root','','register-bd');/*в пустых кавычках
пароль,так-как у нас его не требуют при входе в phpMyAdmin пароль не указываем*/
$result=$mysql->query("SELECT * FROM `users`WHERE `login`='$login' AND `pass`=
  '$pass'");//получение данных из базы данных
  //данные из базы данных конвертируем в массив
  $user=$result->fetch_assoc();
  if(count($user)==0) {
echo "Такой пользователь не найден";
exit();
}
//если длина массива =0, выводится сообщение и работа с массивом прекращается.
//используем куки
setcookie('user',$user['name'],time()+3600,"/");/*команда установит куки,задаём в
секундах сколько будет работать куки,также это время можно продлить
 математическим вычислением, указываем время и область использование
 (сейчас условно куки работает на всех страницах).*/

 $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`,`email`)
 VALUES('$login','$pass','$name',`email`)");

$mysql->close();

header('Location: /');/*возвращает на главную страницу*/
 ?>
