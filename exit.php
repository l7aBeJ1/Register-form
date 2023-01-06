<?php
setcookie('user',$user['name'],time()-3600,"/");/*копируем куки из auth.php
и меняем время + на -*/
header('Location: /');//выполняем переадресацию на главную страницу,из auth.php
 ?>
