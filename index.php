<!DOCTYPE html><!-- создание строк регистрации-->
<html lang="rus"><!--язык разметки-->
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Copatible" content="ie=edge">
    <title>Форма Регистрации</title>
     <!-- подключаем поддержку шрифтов через
      bootstrap -->
    <link rel="stylesheet" href=
    "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"><!--в этом файле длина строк-->
  </head>
  <body>
    <div class ="container mt -4"> <!--отступ сверху-->
<?php
if($_COOKIE['user'] ==''):
 ?>
      <div class="row">
        <div class="col">
          <!--поля с левой стороны-->
          <h1>Форма Регистрации</h1> <!--выводит текст на страницу-->
          <form action="validation-form/check.php" method="post">
           <input type="text" class="form-control" name="login" id ="login"
            placeholder="Введите логин"><br><!-- br отступ по высоте-->
            <input type="text" class="form-control" name="name" id ="name"
            placeholder="Введите имя"><br>
            <input type="password" class="form-control" name="pass" id ="pass"
            placeholder="Введите пароль"><br>
            <input type="password" class="form-control" name="confirm_password" id ="confirm_password"
            placeholder="Введите пароль"><br>
            <input type="email" class="form-control" name="email" id ="email"
            placeholder="Введите email"><br>


            <button class="btn btn-success"
            type="submit">Зарегистрировать</button> <!--данные будут отправлятся на сервер под средством метода post-->

         </form>
        </div>
         <!--для выхода из ака создаём файл
             exit.php-->
        <div class="col">
          <!-- поля с правой стороны-->
          <h1>Форма авторизации</h1>
         <form action="validation-form/auth.php" method="post">
          <input type="text" class="form-control" name="login" id ="login"
           placeholder="Введите логин"><br><!-- br отступ по высоте-->
           <input type="password" class="form-control" name="pass" id ="pass"
           placeholder="Введите пароль"><br>
           <button class="btn btn-success"
           type="submit">Авторизаваться</button><!--данные будут
              отправлятся на страницу под средством метода post -->
         </form>
        </div>
      <?php else: ?>
        <p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a
           href="/exit.php">здесь</a>.</p> <!--для выхода из ака создаём файл
                exit.php-->
      <?php endif; ?>
       </div>
     </body>
    </html>
