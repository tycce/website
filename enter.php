<?php
  session_start();
  header('Content-Type: text/html; charset=utf-8');
  if($_SESSION['admin']){
    header("Location: admin.php");
    exit;
  }
  else if($_SESSION['user']){
    header("Location: index.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">         
    <link rel="stylesheet" href="style/enter.css">
    <title>Вход</title>
</head>
<body class="text-center">
    <div class="signin">
        <form id="form" class="form-signin" method="POST">
            <a href="index.php" class="main-title">Aqua</a>
            <div id="spinner"class="d-flex justify-content-center fade mt-5">
              <div class="spinner-border text-secondary" role="status">
              </div>
            </div>
            <h1 class="h3 mb-3 font-weight-normal">Вход</h1>
            <label for="loginOrEmail" class="sr-only">Логин</label>
            <input id="loginOrEmail" type="text"  name="loginOrEmail" class="form-control" placeholder="Логин или email" >
            <label for="password" class="sr-only">Пароль</label>
            <input id="password" type="password" name="password"  class="form-control mb-3" placeholder="Пароль" >
            <div class="checkbox mb-3 text-left">
              <label>
                <input type="checkbox" value="remember-me" disabled> Запомнить меня
              </label>
            </div>
            <div class="alert alert-danger fade" role="alert">
              Неверный логин или пароль
            </div>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
            
          </form>
          
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/signin.js"></script>
</body>
</html>