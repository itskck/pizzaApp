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
@guest
@endguest
@if($title=='XD') 
  <script>
    alert("Przed złożenieniem zamównienia uzupełnij dane.");
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

  

    <section id="profil">
        
        @if($user->isAdmin==true)
        <div id="adminpanel" class="dark">        
        <fieldset>
        <legend>Panel Admina</legend>

        <div id="adminUsuwanie">
        <div class="dark" style="font-weight:400">Wybierz pizze do usunięcia</div>
        <form role="form"  action="{{ route('usunPizze') }}" id="comment-form" 
                   method="post" >
        <select id="adminUsuwanie" name="pizzaAdminUsuwanie">
        @foreach($pizza as $pizza)
        <option name="kupowanapizza1" value="{{$pizza->nazwa}}">{{$pizza->nazwa}}</option>
        @endforeach
        </select>
        
                  {{ csrf_field() }}
                 <button class='submit' class="btn btn-success"> Usuń </button>
        </form>
        </div>



        <div id="adminDodawanie">
        <div class="dark" style="font-weight:400">Dodaj pizze</div>
        <form role="form"  action="{{ route('dodajPizze') }}" id="comment-form" 
                   method="post" >               
                  

                   <table >
<tbody>
<tr>
<td>Nazwa</td>
<td><input type="text" id="addNazwa" name="addNazwa" required="required"></td>
</tr>
<tr>
<td >Cena małej</td>
<td><input type="numeric" id="addNazwa" step="0.1" min="0" name="addCenaMala" required="required"></td>
</tr>
<tr>
<td >Cena średniej</td>
<td><input type="numeric" id="addNazwa" step="0.1" min="0" name="addCenaSrednia" required="required"></td>
</tr>
<tr>
<td>Cena dużej</td> 
<td> <input type="numeric" id="addNazwa" step="0.1" min="0" name="addCenaDuza" required="required"></td>
</tr>
<tr>
<td >Opis</td>
<td><input type="text" id="addNazwa" name="addOpis" required="required"></td>
</tr>
<tr>
<td id="addKategoriaTD" >Kategoria</td>
<td><input type="radio" name="addKategoria" value="miesne" checked />Mięsna<br>
<input type="radio" name="addKategoria" value="wege" />Wegetariańska<br>
<input type="radio" name="addKategoria" value="vegan" />Wegańska
</td>
</tr>
</tbody>
</table>
                  {{ csrf_field() }}
                 <button class='submit' class="btn btn-success"> Dodaj </button>
        </form>
        </div>
        </div>



        </fieldset>
        </div>
        @endif











        <div id="daneosobowe" class="dark">
        <fieldset>
        <legend>Twoje dane</legend>
        <div>
                {{ __('Imię: ') }}
                <form role="form"  action="{{ route('name') }}" id="comment-form" 
                   method="post" >
                  {{ csrf_field() }}
                  <input type="text" id="name" name="name" value="{{$user->name}}" pattern="^[a-zA-Z]+$">
                  <button class='submit' class="btn btn-success"> edytuj </button>
                </form>
                </div>
                
                <div>
                {{ __('Mail: ') }}
                <form role="form"  action="{{ route('email') }}" id="comment-form" 
                   method="post" >
                  {{ csrf_field() }}
                  <input type="text" id="email" name="email" value="{{$user->email}}" pattern="(^\S+@\S+$)">
                  <button class='submit' class="btn btn-success"> edytuj </button>
                </form>
                </div>
                <div>
                {{ __('Miejscowość: ') }}
                <form role="form"  action="{{ route('miejscowosc') }}" id="comment-form" 
                   method="post" >
                  {{ csrf_field() }}
                  <input type="text" id="miesjcowosc" name="miejscowosc" required="required" value="{{$user->miejscowosc}}" >
                  <button class='submit' class="btn btn-success"> edytuj </button>
                </form>
                </div>
                
                <div>
                {{ __('Ulica: ') }}
                <form role="form"  action="{{ route('ulica') }}" id="comment-form" 
                   method="post" >
                  {{ csrf_field() }}
                  <input type="text" id="ulica" name="ulica" required="required" value="{{$user->ulica}}" >
                  <button class='submit' class="btn btn-success"> edytuj </button>
                </form>
                </div>

                <div>
                {{ __('Numer: ') }}
                <form role="form"  action="{{ route('mieszkanie') }}" id="comment-form" 
                   method="post" >
                  {{ csrf_field() }}
                  <input type="text" id="mieszkanie" name="mieszkanie" required="required" value="{{$user->mieszkanie}}">
                  <button class='submit' class="btn btn-success"> edytuj </button>
                </form>
                </div>
                
                
                
               
                
               
                </fieldset>
        </div>
        
        <div class="dark" id="saldomanagment">
        <fieldset>
        <legend>Doładowywania</legend>
            
        
       
       
                <div>
                    <form role="form"  action="{{ route('doladowanie') }}" id="comment-form" 
                   method="post" >
                        {{ csrf_field() }}
                    <table>  
                     <tr><td><label for="zaplata">Sposób zapłaty </label></td></tr>
                     <tr><td><input type="radio" name="zaplata" value="eurocard" checked />PaySafeCard</td></tr>
                     <tr>   <td><input type="radio" name="zaplata" value="przelew" />Przelew</td>
                    </tr>
                    <tr><td>  <input type="text" id="doladowanie" name="doladowanie" value="0"  pattern="^[0-9]{1,}([.][0-9]{1,2})?$"> </td> 
                        <td> <button class='submit wplacbutton' class="btn btn-success"> wpłać </button></td>
                    </tr>
                    
                    
                    </table>
                    </form>
                    <div style="font-weight: 400;">
                    Twoje pieniądze:  {{$user->saldo}} zł<br>
</div>
                </div>
        </div>
</fieldset>
        </div>
        






        <div id="historia" class="dark">
        <fieldset>
        <legend>Historia zamowień</legend>
       
        
        @foreach($zamowieniosy as $zamowieniosy)
        @if($user->id==$zamowieniosy->userID)
        <div class="dark koszyk-przedmioty">{{$zamowieniosy->pizzaName}}  </div>
        @endif
        @endforeach


        </fieldset>
        </div>
     </section>





  <footer>
    <div class="zielony">
      
    </div>
    <div class="bialy">
      <h1 class="dark">Powered by JP</h1>
    </div>
    <div class="czerwony">
      
    </div>
  </footer>
  
</body>

</html>
