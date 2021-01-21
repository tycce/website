<?php 
session_start();
header('Content-Type: text/html; charset=utf-8');
if($_GET['do'] == 'logout') {
    unset($_SESSION['user']);
    session_destroy();
}
require_once "php/fishDB.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">         
    <link rel="stylesheet" href="components/jquery-ui.min.css">
    <link rel="stylesheet" href="style/main.css">
    <title>Aqua</title>
    
</head>
<!-- TODO -->
<!-- Добавить кол-во в карточку -->
<body>  
    
<!-- header -->

    <?php 
    if ($_SESSION['user'] || $_SESSION['admin']) {
        require "modules/headerUser.php";
    }
    else {
        require_once "modules/header.php";
    }    
        
    ?>

    <!-- Фильтр -->   
    <div class="container">
        <section>
            <div class="btn-group pt-2" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-light active">Все категории</button>
                <button type="button" class="btn btn-light">Акция</button>
                <button type="button" class="btn btn-light">Хит продаж</button>
            </div>
                
            <div class="filter bg-light col-md-12 pb-2 mb-3">
                <form action="" role="form">
                    <div class="row row-cols-md-4 mt-2 pt-2">
                        <div class="col">
                            <h4>Форма тела</h4>

                            <div class="checkbox">
                                <label class = "mb-0"><input class = "mr-1" type="checkbox" name="" value="2">Шар</label>
                            </div>
                            <div class="checkbox">
                                <label class = "mb-0"><input class = "mr-1" type="checkbox" name="" value="2">Треугольный</label>
                            </div>
                            <div class="checkbox">
                                <label class = "mb-0"><input class = "mr-1" type="checkbox" name="" value="2">Змеевидная</label>
                            </div>
                            <div class="checkbox">
                                <label class = "mb-0"><input class = "mr-1" type="checkbox" name="" value="2">Классическая</label>
                            </div>
                            
                        </div>
                        <div class="col">
                            <h4>Размер</h4>
                            <div class="checkbox">
                                <label class = "mb-0"><input class = "mr-1" type="checkbox" name="" value="1">S-малек</label>
                            </div>
                            <div class="checkbox">
                                <label class = "mb-0"><input class = "mr-1" type="checkbox" name="" value="2">M-подросток</label>
                            </div>
                            <div class="checkbox">
                                <label class = "mb-0"><input class = "mr-1" type="checkbox" name="" value="2">L-молодая половозрелая</label>
                            </div>
                            <div class="checkbox">
                                <label class = "mb-0"><input class = "mr-1" type="checkbox" name="" value="2">XL-взрослая половозрелая</label>
                            </div>
                            <div class="checkbox">
                                <label class = "mb-0"><input class = "mr-1" type="checkbox" name="" value="2">XXL-шоу-размер*</label>
                            </div>
                        </div>
                        <div class="col">
                            <h4>Тип питания</h4>
                            <div class="checkbox">
                                <label class = "mb-0"><input class = "mr-1" type="checkbox" name="" value="2">плотоядные</label>
                            </div>
                            <div class="checkbox">
                                <label class = "mb-0"><input class = "mr-1" type="checkbox" name="" value="2">всеядные</label>
                            </div>
                        </div>
                        
                        <!-- Слайдер-фильтр -->
                        <div class="col">
                            <h4>Фильтр по ценам</h4>
                            <div id="prices-label" class ="ml-5"><?php echo getMinPrice()." - ".getMaxPrice()." руб."?></div>
                            <br>
                            <input type="hidden" id="min-price" name="min_price" value="<?php echo getMinPrice()?>">
                            <input type="hidden" id="max-price" name="max_price" value="<?php echo getMaxPrice()?>">
                            <div id="prices"></div>                           
                        </div> 
                        <div class="col mt-0 float-left">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">В наличие</label>
                              </div>     
                        </div>
                                 
                    </div>   
                </form>
            </div>
        </section>
        
<!-- Каталог рыб -->
        <main class="cards">
            <div class="row">
                <?php 
                
                $arr = getData();

                foreach($arr as $product):?>
                <div class="col-xl-3 col-md-4 col-sm-6 col-xs-12 mb-3">
                    <div class="card">
                        <div class="card__blur">
                            <img src=<?php echo $product["fish_img"]?> class="card-img-top" style="height: 11rem;" alt="...">
                            <svg class="card__eyes"width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg>   
                        </div> 
                                    
                        <div class="card-body pt-2">
                            <h5 class="card-title"><?php echo $product["fish_name"]?></h5>
                            <p class="card-text mb-0">Размер - <?php echo $product["fish_size"]?></p>
                            <p class="card-text mb-0"><?php echo $product["fish_type"]?></p>
                            <b class="card-text d-flex justify-content-center mt-3">Цена - <?php echo $product["fish_price"]?>р</b>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <a href="#" class="btn btn-primary">Купить</a>
                                <svg class ="shop__img"width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                                
                            </div>               
                        </div>
                    </div>
                </div>
                <?php endforeach;?>

            </div>    
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script> 
    <script src="components/jquery-ui.min.js"></script>
    <script src="js/fish.js"></script>
</body>
</html>