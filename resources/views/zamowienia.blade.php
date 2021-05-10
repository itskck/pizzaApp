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
  @if($title=='biedak') 
  <script>
    alert("Za mało środków sir. Doładuj konto.");
  </script>
  @endif
  @if($title=='bogacz')
  <script>
    {{$title='yyy'}}
    window.location.reload();
    
  </script>
  @endif
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
          @auth
          <a  class="zamowtopls"  href="zamowienia">Zamów online</a>
          @endauth
      </li>
      <li>
        <a href="/#miesne">Menu</a>
      </li>
       <li>
        <a  href="/">Strona Główna  </a>
      </li>
    </ul>
  </nav>

  <section class="kupowanko">
  
      <div class="lewy"> 
      
        <div class="pizzagen">
        
        
        <form role="form"  action="{{ URL('pizzagen')}}" id="pizzaform" 
                   method="post" >
                   {{ csrf_field() }}
                       
            <select id="pizza" name="kupowanapizza">
            @foreach($pizza as $pizzas) 
                  <option name="kupowanapizza1" value="{{$pizzas->nazwa}}">{{$pizzas->nazwa}}</option>
                  
                  @endforeach
                  </select>
             
              <div class="rozmiar">
              <input id="rozmiarmaly" name="rozmiar" type="radio" value="1" checked><label for="rozmiarmaly" >Mała</label>
              <input id="rozmiarsredni" name="rozmiar" type="radio" value="2"><label for="rozmiarsredni">Średnia</label>
              <input id="rozmiarduzy" name="rozmiar" type="radio" value="3"><label for="rozmiarduzy">Duża</label>
            </div>               
                @auth
                
                <button class='submit mniam mniam2' class="btn btn-success" id="guzik"> Dodaj do koszyka </button>
    
                            @endauth
                            @guest
                    <a href="{{ route('login') }}">Zaloguj sie</a> 
                            @endguest
               
                </form>





            
          
         </div>
        </div>
        
      <div id="koszyk">
      
      <div  id="koszyk-przedmioty">
        <div id="koszykNazwy">
         @foreach($zamowienie as $zamowienie)
         <div class="dark koszyk-przedmioty">{{$zamowienie}}  </div>
        
        @endforeach
</div>
<div id="koszykCeny">
        @foreach($zamowienieCena as $zamowienieCena)
         <div class="dark koszyk-przedmioty"> {{$zamowienieCena}} zł </div>
        
        @endforeach
</div>
        </div>
        <div id="koszyk-przerwa"></div>
        <div id="koszyk-koszt" class="dark" style="font-weight:400;">Do zapłaty: {{$user->wartosckoszyka}} ZŁ</div>
        <div id="koszykbuttony">
        <ul id="ulkoszyk">
        <li>
        <a href="{{ URL('zamawiam')}}">Zamawiam!</a>
        
        </li>
        <li>
        <a href="{{ URL('delete')}}" class="btn btn-default">Wyczyść</a>
        </li>
        </ul>
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
  
    <script src="./js/skrypt.js"></script>
</body>

</html>
