<?php header('Content-Type: text/html; charset=utf-8');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">         
    <link rel="stylesheet" href="style/registration.css">
    <title>Регистрация</title>
</head>
<body class="bg-light">
    <div class="container">
  <div class="py-5">
  <div class="row">
    <div class="col-md-6 m-auto">
      <h4 class="h1 mb-5 text-center">Регистрация</h4>

      <form id="form" class="needs-validation" method="POST">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Имя</label>
            <input type="text" class="form-control" id="user_firstname" placeholder="Имя" name="user_firstname">
          </div>
          <div class="col-md-6 mb-4">
            <label for="lastName">Фамилия</label>
            <input type="text" class="form-control" id="user_lastname" placeholder="Фамилия" name="user_lastname">
          </div>
        </div>

        <div class="row m-0 mb-3 ">

          <div class="col-4 p-0">
          <label for="day">День</label>
          <select class="custom-select select-border-first" id="day" name="day">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
          </div>

          <div class="col-4 p-0">
            <label for="month">Месяц</label>
            <select class="custom-select select-border-second" id="month" name="month">
                <option value="1">Январь</option>
                <option value="2">Февраль</option>
                <option value="3">Март</option>
                <option value="4">Апрель</option>
                <option value="5">Май</option>
                <option value="6">Июнь</option>
                <option value="7">Июль</option>
                <option value="8">Август</option>
                <option value="9">Сентябрь</option>
                <option value="10">Октябрь</option>
                <option value="11">Ноябрь</option>
                <option value="12">Декабрь</option> 
              </select>
          </div>

          <div class="col-4 p-0">
            <label for="year">Год</label>
            <select class="custom-select select-border-third" id="year" name=year>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option value="1989">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
                <option value="1986">1986</option>
                <option value="1985">1985</option>
                <option value="1984">1984</option>
                <option value="1983">1983</option>
                <option value="1982">1982</option>
                <option value="1981">1981</option>
                <option value="1980">1980</option>
                <option value="1979">1979</option>
                <option value="1978">1978</option>
                <option value="1977">1977</option>
                <option value="1976">1976</option>
                <option value="1975">1975</option>
                <option value="1974">1974</option>
                <option value="1973">1973</option>
                <option value="1972">1972</option>
                <option value="1971">1971</option>
                <option value="1970">1970</option>
                <option value="1969">1969</option>
                <option value="1968">1968</option>
                <option value="1967">1967</option>
                <option value="1966">1966</option>
                <option value="1965">1965</option>
                <option value="1964">1964</option>
                <option value="1963">1963</option>
                <option value="1962">1962</option>
                <option value="1961">1961</option>
                <option value="1960">1960</option>
                <option value="1959">1959</option>
                <option value="1958">1958</option>
                <option value="1957">1957</option>
                <option value="1956">1956</option>
                <option value="1955">1955</option>
                <option value="1954">1954</option>
                <option value="1953">1953</option>
                <option value="1952">1952</option>
                <option value="1951">1951</option>
                <option value="1950">1950</option>
              </select>
          </div>

        </div>

        <div class="mb-3">
          <label for="username">Логин</label>
          <div class="input-group">
            <input type="text" class="form-control" id="user_login" placeholder="Логин" name="user_login">
            <div class="spinner-border position-absolute text-primary" style="right:7px; top:7px; width: 25px; height: 25px; display: none;" role="status">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <div class="input-group">
            <input type="email" class="form-control" id="user_email" placeholder="email@example.com" name="user_email">
            <div class="spinner-border position-absolute text-primary" style="right:7px; top:7px; width: 25px; height: 25px; display: none;" role="status">
            </div>
          </div>
        </div>

        <div class="mb-3">      
            <label for="password">Пароль</label>
            <div class="input-group">
              <input type="password" class="form-control" id="user_password" placeholder="Пароль" name="user_password">
            </div>
        </div>

        <div class="mb-5">
            <label for="enterPassword">Подтвердите пароль</label>
            <input type="password" class="form-control" id="enterPassword" placeholder="Подтвердите пароль">
        </div>

        

        <!-- <div class="row">
            <div class="col-md-6 mb-5">
                <label for="promocode">Промокод</label>
                <div class="input-group">  
                    <input id="promocode" type="text" class="form-control" placeholder="Промокод">
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Ввести</button>
                    </div>
                </div>
            </div>
          </div> -->

        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/registration.js"></script>
</body>
</html>
