<!DOCTYPE html>
<html lang="pl">

<head>
 
  <script src="./js/swiper.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 
  <link rel="stylesheet" href="css/swiper.min.css">
  <title>Viva La Pizza!</title>

<body>
<nav>
    
    <div id="logodiv">
    <a  href="/"> <img id="logo"  href="/" src="images/logo.png" alt="alforno"></a>
      </div>
    <ul id="navlist">
        <li>
            @auth
            <a href=/home>Saldo: {{$user->saldo}} zł</a>
            @endauth
        </li>    
    <li>
            @guest
            <a href=/login>Zaloguj się</a>
            @endguest
            @auth
            <a href=/home>Witaj ponownie, {{$user->name}} </a>
            @endauth
        </li>
      <li >
        <a href="kontakt">Kontakt</a>
      </li>
      <li>
        <a  class="zamowtopls"  href="zamowienia">Zamów online</a>
      </li>
      <li>
        <a href="#miesne">Menu</a>
      </li>
       <li>
        <a  href="#">Strona Główna  </a>
      </li>
    </ul>
  </nav>
  <footer>
    <div class="zielony">
      &nbsp;
    </div>
    <div class="bialy">
      <h1 class="dark">Powered by JP</h1>
    </div>
    <div class="czerwony">
      &nbsp;
    </div>
  </footer>
  
</body>

</html>