<!DOCTYPE html>
<html lang="pl">

<head>

  <script src="./js/swiper.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>" type="text/css">
  <link rel="stylesheet" href="css/swiper.min.css">
  <title>Viva La Pizza!</title>

<body>

  <nav>
    <div id="logodiv">
      <a href="/"> <img id="logo" href="/" src="images/logo.png" alt="alforno"></a>
    </div>
    <ul id="navlist">
      <li>
        @auth
        <a href=/home>Saldo: {{$user->saldo}} zł</a>
        @endauth
        @guest
        <a href=/register>Zarejestruj się</a>
        @endguest
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
      <li>
        <a href="kontakt">Kontakt</a>
      </li>
      <li>
        @auth
        <a class="zamowtopls" href="zamowienia">Zamów online</a>
        @endauth
      </li>
      <li>
        <a href="#miesne">Menu</a>
      </li>
      <li>
        <a href="#">Strona Główna </a>
      </li>
    </ul>
  </nav>

  <section id="hero">
    <h1 class="onastitle light">
      Prawdopodobnie najlepsza pizza w Lublinie!

    </h1>
    <h2 class="onasopis light">
      Oferujemy pizze o najwyższej jakości oraz serwis na jak najwyższym poziomie.
    </h2>
    @auth
    <button class="mniam" onclick="location.href='zamowienia'">

      Zamów pizzę
    </button>
    @endauth
    @guest
    <button class="mniam" onclick="location.href='{{ route('login') }}'">

      Zamów pizzę
    </button>
    @endguest
  </section>


  <section id="onas">
    <img id="fotkaonas" src="images/onaspizza.png" alt="riiiiiiiiiiiiiiii">
    <div id="tekstonas">
      <h1 class="osnastitle dark">O nas</h1>
      <h2 class="onasopis dark justified"> Robimy taką dobrą pizze ze aż się uszy trzęsą. Jesteśmy na rynku od 997 roku, to my serwowaliśmy pizze na zjeździe gnieźnieńskim. Na bieżąco przygotowujemy ciasto, dostarczamy warzywa, mięso i komponujemy dodatki tak, aby nasze pizze smakowały naprawdę wyjątkowo. Oferujemy pizze o najwyższej jakości oraz serwis na jak najwyższym poziomie. Gwarantujemy, że w naszym menu z pewnością znajdą Państwo bogactwo smaków, korzystne ceny oraz przede wszystkim…najsmaczniejszą pizzę!</h2>
    </div>
  </section>





  <section id="kategorie">
    <div class="kategoria">
      <a href="#miesne"><img src="images/pizzamiesna.png" alt="mmmmiesko"></a>
      <div>Pizze mięsne</div>
    </div>
    <div class="kategoria">
      <a href="#wegetarianskie"><img src="images/pizzawege.png" alt="notmieso"></a>
      <div>Pizze wegetariańskie</div>
    </div>
    <div class="kategoria">
      <a href="#veganskie"> <img src="images/pizzavegan.png" alt="trawaikamienie"></a>
      <div>Pizze wegańskie</div>
    </div>
  </section>



  <section id="menu">
    <div class="menucontent">
      <table class="maintable">
        <tr>
          <th>

          </th>
          <th>
            30cm
          </th>
          <th>
            40cm
          </th>
          <th>
            60cm
          </th>
        </tr>
        <tr>
          <td class="menukategoria" id="miesne" colspan="4">Pizze Mięsne</td>
        </tr>
        <tr>
          @foreach($pizza as $pizzas)
        <tr>
          @if($pizzas->kategoria == 'miesne')
          <td>
            <div class="nazwapizzy">{{$pizzas->nazwa}}</div>
            <div class="opispizzy">{{$pizzas->opis}}</div>
          </td>
          <td class="cena">
            {{$pizzas->cenaMala}}zł
          </td>
          <td class="cena">
            {{$pizzas->cenaSrednia}}zł
          </td>
          <td class="cena">
            {{$pizzas->cenaDuza}}zł
          </td>
          @endif
        </tr>
        @endforeach
        </tr>


        <tr>
          <td class="menukategoria" id="wegetarianskie" colspan="4">Pizze Wegetariańskie</td>
        </tr>
        @foreach($pizza as $pizzas)
        <tr>
          @if($pizzas->kategoria == 'wege')
          <td>
            <div class="nazwapizzy">{{$pizzas->nazwa}}</div>
            <div class="opispizzy">{{$pizzas->opis}}</div>
          </td>
          <td class="cena">
            {{$pizzas->cenaMala}}zł
          </td>
          <td class="cena">
            {{$pizzas->cenaSrednia}}zł
          </td>
          <td class="cena">
            {{$pizzas->cenaDuza}}zł
          </td>
          @endif
        </tr>
        @endforeach


        <tr>
          <td class="menukategoria" id="veganskie" colspan="4">Pizze Wegańskie</td>
        </tr>

        @foreach($pizza as $pizzas)
        <tr>
          @if($pizzas->kategoria == 'vegan')
          <td>
            <div class="nazwapizzy">{{$pizzas->nazwa}}</div>
            <div class="opispizzy">{{$pizzas->opis}}</div>
          </td>
          <td class="cena">
            {{$pizzas->cenaMala}}zł
          </td>
          <td class="cena">
            {{$pizzas->cenaSrednia}}zł
          </td>
          <td class="cena">
            {{$pizzas->cenaDuza}}zł
          </td>
          @endif
        </tr>
        @endforeach


      </table>
      <h3>Wybrana?</h3>
      @auth
      <button class="mniam mniam2" onclick="location.href='zamowienia'">
        Zamów pizzę 🍕
      </button>
      @endauth
      @guest
      <button class="mniam mniam2" onclick="location.href='{{ route('login') }}'">
        Zamów pizzę 🍕
      </button>
      @endguest
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