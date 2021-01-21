<?php require_once "php/auth.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">         
    <link rel="stylesheet" href="components/jquery-ui.min.css">    
    <link rel="stylesheet" href="style/admin.css">
    
    <title>Admin</title>
</head>
<body>

    <?php require_once "modules/headerAdmin.php"?>

    <div class="container-xl">  
        <table id="table" class="table table-dark table-hover table-sm table-fixed mt-5 mt-0">
            <thead class="">
                <tr class="d-flex">
                    <th class="col-xs-1">#</th>
                    <th class="col-xs-1">Название</th>
                    <th class="lil-col">Цена</th>
                    <th class="lil-col">Размер</th>
                    <th class="lil-col">Кол-во</th>
                    <th class="col-xs-1">Тип</th>
                    <th class="col-xs-1">Форма тела</th>
                    <th class="col-xs-1">Изображение</th>
                </tr>
            </thead>
            <tbody>
            <?php
              require_once "php/fishDB.php";
              $arr = getData();

            ?>
            <?php for($i = 0; $i < count($arr); $i++):?>
                <tr class="d-flex" data-fish_id="<?php echo $arr[$i]["id"]?>">
                    <td><?php echo $i+1 ?></td>
                    <td><?php echo $arr[$i]["fish_name"]?></td>
                    <td class="lil-col"><?php echo $arr[$i]["fish_price"]?></td>
                    <td class="lil-col"><?php echo $arr[$i]["fish_size"]?></td>
                    <td class="lil-col"><?php echo $arr[$i]["fish_amount"]?></td>
                    <td><?php echo $arr[$i]["fish_type"]?></td>
                    <td><?php echo $arr[$i]["fish_form"]?></td>
                    <td>
                        <svg class="show-fish" data-img="<?php echo $arr[$i]["fish_img"]?>" data-toggle="modal" data-target="#modalImage" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/></svg>  
                    </td>
                </tr>
            <?php endfor;?>   
            </tbody>
        </table>

        <div class="modal fade" id="modalImage" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img src="" class="eye-img" alt="">
                </div>
              </div>
            </div>
          </div>

        <div class="btn-group float-right" id="btns">
            <button class="btn btn-success" id="btnAdd" data-action="add" data-toggle="modal" data-target="#Modal">Добавить</button>
            <button class="btn btn-info" id="btnEdit" data-action="edit" data-toggle="modal" data-target="#Modal" disabled>Изменить</button>
            <button class="btn btn-danger" id="btnRemove" data-action="remove" data-toggle="modal" data-target="#Modal" disabled>Удалить</button>
        </div> 
    </div>



  <!-- Модальное окно -->
  <div class="modal fade" id="Modal" data-keyboard="false" tabindex="-1" aria-hidden="true" data-action="add" data-fish_id="0">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Добавить</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form" method="POST">
                <!-- Название Цена-->
                <div class="form-group">
                    <div class="d-flex">
                        <label for="fish_name" class="col-8 pl-0 mr-1">Название рыбки</label>
                        <label for="fish_price" class="col-4 pl-0">Цена</label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input type="text" class="form-control col-8 mr-1" id="fish_name" name="fish_name">
                        <div class="input-group col-4 p-0">          
                            <input type="number" class="form-control" id="fish_price" value="0" name="fish_price">
                            <div class="input-group-append">
                              <span class="input-group-text">Руб</span>
                            </div>                            
                        </div>
                    </div>
                </div>

                <!-- Размер и Тип-->
                <div class="form-group">
                    <div class="d-flex">
                        <label for="fish_type" class="col-8 pl-0 mr-1">Тип</label>
                        <label for="fish_size" class="col-2 pl-0 mr-1">Размер</label>
                        <label for="fish_size" class="col-2 pl-0">Кол-во</label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input type="text" class="form-control col-8 mr-1" id="fish_type" name="fish_type">
                        <div class="col-4 d-flex p-0 pr-1">
                          <select class="custom-select col-6" id="fish_size" name="fish_size">
                              <option value="default" selected>Выбрать...</option>
                              <option value="xs">XS</option>
                              <option value="s">S</option>
                              <option value="m">M</option>
                              <option value="l">L</option>
                              <option value="xl">XL</option>
                              <option value="xxl">XXL</option>
                              <option value="xxxl">XXXL</option>
                          </select>
                          <input type="number" class="form-control col-6 ml-1" id="fish_amount" value="0" name="fish_amount">
                        </div>
                        
                    </div>
                </div>  

                <!-- Форма тела и Изображение -->
                <div class="form-group">
                    <div class="d-flex">
                        <label for="fish_form" class="col-8 pl-0 mr-1">Форма тела</label>
                        <label for="fish_img" class="col-4 pl-0">Изображение</label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <input type="text" class="form-control col-8 mr-1" id="fish_form" name="fish_form">
                        <div class="custom-file col-4">
                            <input type="file" class="custom-file-input" id="selectImg" name="fish_img">
                            <label class="custom-file-label">Выбрать</label>
                        </div>
                    </div>
                </div>
                <img src="" id="fish_img" class="modal-img img-thumbnail" alt="">
                </div>
              
                <!-- Кнопка добавить -->
                <div class="modal-footer">
                    <button type="submit" data-target="#Modal" class="btn btn-primary">Добавить</button>
                </div>
              </form>    
        </div>
      </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <script src="js/admin.js"></script>
    
</body>
</html>