<!DOCTYPE html>
<html lang="pl">

<head>
 
  <script src="./js/swiper.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
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
        <li class="dropParent">
            @guest
            <a href=/login>Zaloguj się</a>
            
            @endguest
            @auth
            <a href=/home>Witaj ponownie, {{$user->name}} </a>
            <div class="dropdown">
            <a href="{{ url('/logout') }}"> Wyloguj się </a>
 
            </div>
            @endauth
        </li>
      <li >
        <a href="kontakt">Kontakt</a>
      </li>
      <li>
        <a  class="zamowtopls"  href="zamowienia">Zamów online</a>
      </li>
      <li>
        <a href="/#miesne">Menu</a>
      </li>
       <li>
        <a  href="/">Strona Główna  </a>
      </li>
    </ul>
  </nav>

  <section id="kontakt">
      <div id="mapka">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2969.9684337133385!2d22.561651451234603!3d51.24788474294724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47225769bc14eabd%3A0x663ed5b4411932f0!2sViva%20La%20Pizza%20Lublin!5e0!3m2!1spl!2spl!4v1591360185446!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

      </div>
      <div id="danekontaktowe">
            <h1 class="dark">Skontaktuj się z nami!</h1>
            <br><br>
            
            <div id="therealdanekontaktowe">
            <div id="kontaktadres"> 
                <h2 class=" dark placeholder">Adres</h2>
                <h3 class="dark">Krakowskie przedmieście 30/8 Lublin</h3>
            </div>
            <div id="kontakttelefon">
                <h2 class="dark placeholder">Kontakt</h2> 
                <h3 class="dark">Telefon: 133702137</h3>
                <h3 class="dark">Email: dobrapicka@gmail.com</h3>
            </div>
            <div id="kontaktgodziny">
                <h2 class="dark placeholder">Godziny otwarcia:</h2>
                <h3 class="dark">Codziennie 6-23</h3>
            </div>
        </div>
      </div>
  </section>

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
