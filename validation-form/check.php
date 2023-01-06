<?php
/* Чтобы записать в базу данных mysql информацию с файла индекс, указываем
существующие уже элементы с таблицы регистрации и переменные.
filter_var-нужен для фильтрации от ненужных пробелов для записи в базу.
trim-нужен для фильтрации ненужных языковых элементов для записи в базу.
Post(или GET)-метод передачи данных*/

$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING);
$confirm_password = filter_var(trim($_POST['confirm_password']),
FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),
FILTER_SANITIZE_STRING);
/*через условие мы регулируем мининмум и максимум символов*/
if (mb_strlen($login)<6||mb_strlen($login)>20){
  echo "Длина login должна быть от 6 до 20 символов!";
exit();
}
if(mb_strlen($name)<2||mb_strlen($name)>20){
echo "Длина name должна быть от 2 до 20 символов!";
exit();
}
else if (preg_match('~\d~',$name)) { //условие при котором в имени не должно быть цифр
echo "Имя должно состоять из букв!";
exit();
}
else if(mb_strlen($pass)<6||mb_strlen($pass)>20){
echo "Длина password должна быть от 6 до 20 символов!";
exit();
}
else if (! preg_match('~\d~', $pass)) { //проверка регулярным выражением на содержание цифр
echo "В пароле должна быть хоть 1 цифра!";
exit();
}
else if (! preg_match('~[a-zа-яё]~', $pass)) {//проверка регулярным выражением на содержание букв
echo "В пароле должна быть хоть 1 буква!";
exit();
}
else if($confirm_password != $pass){//проверка на совпадения паролей
echo "Пароль не совпадает!";
exit();
}
else if(mb_strlen($email)<10||mb_strlen($email)>40){
echo "Длина email должна быть от 10 до 40 символов!";
exit();
}

//делаем проверку через базу данных на существующую почту и логин
$mysql=new mysqli('localhost','root','','register-bd');
$result=$mysql->query("SELECT * FROM `users`WHERE`email`=
  '$email' OR `login`='$login'");//получение данных из базы данных
  //данные из базы данных конвертируем в массив
  $user=$result->fetch_assoc();
  if(count($user)!=0) {
echo "Email или login уже используется!";
exit();
}

$pass = md5($pass."sol_фыв123");/*кеширование пароля методом соль,производится
сравнения пароля и кеша(пароль и кеш должен быть одинаковый при
регистрации и авторизации).*/
/*дальше пишем на языке mysql-обращаемся к базе данных*/
$mysql=new mysqli('localhost','root','','register-bd');/* меняем имя хоста,
логин,пароль,база данных Mysql на данные значения удаленного сервера.
Для работы с удаленным серверам также требуется домен, например:org,by,com
и тд.*/

$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`,`email`)/*создаём путь*/
VALUES('$login','$pass','$name','$email')");/*при заполнении формы регистрации данные хранятся в переменных $ и отдельно фиксируются в базе данных*/

 $result= mysqli_query ($connect, $query);

$mysql->close();//после всех задач в базе данных мы её закрываем
header('Location:/');//после прохождения регистрации отправляет на указанную стратицу, в нашем случае на главную
?>
