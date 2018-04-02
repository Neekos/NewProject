<!DOCTYPE html>
 <html>
 <head>
 	<title>admin</title>
 	<link rel="stylesheet" type="text/css" href="/../template/default/css/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="/../template/default/css/style.css">
 	<div class="container headeradm">
      <div class="row">
          <div class="col-md-12">
              <div class="logotip">
                  <img src="../file/logo1.png" class="logadm">
              </div>
              <div class="admuser">
                  <div id="navbar" class="navbar-collapse collapse col">
          <ul class="nav navbar-nav navadm">
          <li><a href="http://redhorsek:86/">Перейти на сайт</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Админ <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>

              <?php if(!$_SESSION['logged_user']): ?>
              <li><a href="?action=registration">Зарегистрироваться</a></li>
              <li><a href="?action=login">Вход</a></li>
              <?php else: ?>
               <li><a href="?action=lk">Личный кабинет</a></li> 
              <li><a href="?action=logout">Выход</a></li>
              <?php endif; ?>
          </ul>
          
        </div><!--/.nav-collapse -->
              </div>
          </div>
      </div>  
    </div> 
    <hr>  
     <div class="container">
        <div class="row">
            <div class="col-md-2 rig">
                <div id="navbar" class="navbar-collapse collapse col">
                  <ul class="nav navbar-nav">
                    <li class="adm"><a href="?action=main">Главная </a></li>
                    <li class="adm"><a href="?action=article">Новости</a></li>
                    <li class="adm"><a href="?action=galerey">Фотогалерея</a></li>
                    <li class="adm"><a href="?action=price">Прайс лист</a></li>
                    <li class="adm"><a href="?action=akciy">Акции</a></li>
                    <li class="adm"><a href="?action=forum">Форум</a></li>
                    <li class="adm"><a href="?action=about">О нас</a></li>  
                  </ul>
                </div><!--/.nav-collapse -->
            </div>
            <div class="col-md-10">
                <?php
                $postss = posts_getall();
                ?>
                
                <br>
                    <table border="1" width="80%" >
                        <tr>
                            <td style="text-align: center;">№</td>
                            <td style="text-align: center;">Время</td>
                            <td style="text-align: center;">Заголовок</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php foreach ($postss as $item) :?>
                            <tr>
                                <td style="text-align: center;"><?php echo $item['id_post'];?></td>
                                <td style="text-align: center;"><?php echo $item['datetime'];?></td>
                                <td style="text-align: center;"><?php echo $item['title'];?></td>
                                <td style="text-align: center;"><a href="?action=edit&id=<?=$item['id_post']?>">Редактировать</a></td>
                                <td style="text-align: center;"><a href="?action=delete&id=<?=$item['id_post']?>">Удалить</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <a href="?action=add">Добавить статью</a>
            </div>  
        </div>
    </div>
 </body>
 </html>