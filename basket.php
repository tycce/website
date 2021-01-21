<?php header('Content-Type: text/html; charset=utf-8');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">         
    <link rel="stylesheet" href="style/main.css">
    <title>Basket</title>
</head>
<body>
    <?php require_once "modules/header.php";?>

    <div class="container">
        <div class="cards mt-4">
            <div class="card mt-1">
                
                <div class="card-body row pb-0">

                    <div class="col-md-6 col-lg-3 ">
                        <img src="img/fish/fish4.png" class="mx-auto d-block" style="height: 5rem; border-radius: 50px" alt="...">
                        <h6 class="card-title text-center">Радужный Бо</h6>
                    </div>

                    <div class="d-flex flex-column justify-content-center col-md-6 col-lg-3 mb-4">
                        <p class="card-text m-0">Рaзмер : xl</p>
                        <p class="card-text m-0">Плотоядная</p>
                        <p class="card-text m-0">Классическая</p>
                    </div>   

                    <div class="d-flex flex-column justify-content-center col-md-6 col-lg-3 ml-auto">
                        <p class="card-text m-0">Цена : 350 руб.</p>
                        <div class="d-flex">
                            <label class="card-text m-0 text-center">Количество: </label>
                            
                        </div>       
                    </div> 

                    <button type="button" class="close ml-auto mb-auto mt-0" data-dismiss="alert" aria-label="Close" >
                        <span class="text-danger" aria-hidden="true" style="font-size: 1.4rem; line-height: 0.1em;">&times;</span>
                    </button>

                </div>

                <div class="card-body row py-0 justify-content-center">
                    <div class="col-md-4 col-lg-3" >
                        <h6 class="card-title text-center">Итого : </h6>
                    </div>           
                </div>

            </div>        
        </div>       
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>