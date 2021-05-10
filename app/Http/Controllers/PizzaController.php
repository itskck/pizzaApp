<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\_pizza;
use Illuminate\Http\Request;
use App\User;
use App\ZamowienieModel;
use App\Http\Requests\ZamowienieRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MiejscowoscRequest;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\MieszkanieRequest;
use App\Http\Requests\UlicaRequest;
use App\Http\Requests\NameRequest;
use App\Http\Requests\DoladowanieRequest;
use App\Http\Requests\PizzaRequest;
use App\Http\Requests\PizzaAddRequest;
use View;
use App\zamowienia;

class PizzaController extends Controller
{
    public function index()
    {

        $user=Auth::user();
        
        $pizza=_pizza::all();
        return view('index',['pizza'=>$pizza],['user'=>$user]);

        
    }
    public function kontakt()
    {
        $user=Auth::user();

        return view('kontakt',['user'=>$user]);
    }
    public function zamowienia()
    {
        $pizza=_pizza::all();
        $user=Auth::user();
        $suma = 0.00;
        $cena=0.00;
        $koszykwyslij=ZamowienieModel::all();
        $zamowienieCena=DB::table('koszyk')->SELECT('cena')->WHERE('userID',$user->id)->pluck('cena');
        $zamowienie=DB::table('koszyk')->SELECT('nazwa')->WHERE('userID',$user->id)->pluck('nazwa');
        return view('zamowienia',compact('user','pizza','suma','koszykwyslij','zamowienie','cena','zamowienieCena'))->withTitle('yyy');
    }
    public function profil()
    {
        $user=Auth::user();
        return view('profil',['user'=>$user]);
    }
    public function pizzagen(ZamowienieRequest $request){
        //dd($request->kupowanapizza);
        $pizza=_pizza::all();
        $user=Auth::user();
        $suma = 0.00;
        $koszyk=new ZamowienieModel;
        
        if($request->rozmiar==1)
        {
        $wielkosc=DB::table('_pizza')
        ->SELECT('cenaMala')
        ->WHERE('nazwa',$request->kupowanapizza)
        ->first();
        $cena=$wielkosc->cenaMala;
        }
        if($request->rozmiar==2)
        {
        $wielkosc=DB::table('_pizza')
        ->SELECT('cenaSrednia')
        ->WHERE('nazwa',$request->kupowanapizza)
        ->first();
        $cena=$wielkosc->cenaSrednia;
        }
        if($request->rozmiar==3)
        {
        $wielkosc=DB::table('_pizza')
        ->SELECT('cenaDuza')
        ->WHERE('nazwa',$request->kupowanapizza)
        ->first();
        $cena=$wielkosc->cenaDuza;
        }
        //dd($cena);
        
        $koszyk->nazwa=$request->kupowanapizza;
        //dd($request->kupowanapizza);
       // dd($koszyk->nazwa);
        $koszyk->rozmiar=$request->rozmiar;
        $koszyk->cena=$cena;
        $koszyk->userID=$user->id;
        
        
        $koszyk->update();
        $koszyk->save();
        $user->wartosckoszyka=$user->wartosckoszyka+$cena;
        $user->save();
        $user->update();
        //dd($user->wartosckoszyka,$cena  );   
        $koszykwyslij=ZamowienieModel::all();
        $zamowienie=DB::table('koszyk')->SELECT('nazwa')->WHERE('userID',$user->id)->pluck('nazwa');
        $zamowienieCena=DB::table('koszyk')->SELECT('cena')->WHERE('userID',$user->id)->pluck('cena');
        //return view::make('zamowienia',['user'=>$user],['pizza'=>$pizza],['suma'=>$suma],['koszyk'=>$koszyk]);
        return view('zamowienia',compact('user','pizza','suma','koszykwyslij','zamowienie','cena','zamowienieCena'))->withTitle('yyy');
    }
    public function delete()
    {
        $pizza=_pizza::all();
        $user=Auth::user();
        $suma = 0.00;
        $koszykwyslij=ZamowienieModel::all();
        $cena=0.00;
        
        DB::table('koszyk')->WHERE('userID','=',$user->id)->DELETE();
        $user->wartosckoszyka=0.00;
        $user->save();
        $user->update();
        $zamowienieCena=DB::table('koszyk')->SELECT('cena')->WHERE('userID',$user->id)->pluck('cena');
        $zamowienie=DB::table('koszyk')->SELECT('nazwa')->WHERE('userID',$user->id)->pluck('nazwa');
        return view('zamowienia',compact('user','pizza','suma','koszykwyslij','zamowienie','cena','zamowienieCena'))->withTitle('yyy');

    }
    public function home()
    {
        $pizza=_pizza::all();
        $zamowieniosy=zamowienia::all();
        $user=Auth::user();
        return view('home',compact('user','zamowieniosy','pizza'))->withTitle('kanapka');    }
    public function miejscowosc(MiejscowoscRequest $request)
    {
        $pizza=_pizza::all();
        $zamowieniosy=zamowienia::all();
        $user = Auth::user();
        $user->miejscowosc=$request->miejscowosc;
        $user->save();
        $user->update();
        return view('home',compact('user','zamowieniosy','pizza'))->withTitle('kanapka');    }
    public function email(EmailRequest $request) {
        $pizza=_pizza::all();
        $zamowieniosy=zamowienia::all();
        $user = Auth::user();
        $user->email=$request->email;
        $user->save();
        $user->update();
        return view('home',compact('user','zamowieniosy','pizza'))->withTitle('kanapka');    }
     public function mieszkanie(MieszkanieRequest $request) {
        $pizza=_pizza::all();
        $zamowieniosy=zamowienia::all();
        $user = Auth::user();
        $user->mieszkanie=$request->mieszkanie;
        $user->save();
        $user->update();
        return view('home',compact('user','zamowieniosy','pizza'))->withTitle('kanapka');    }
     public function ulica(UlicaRequest $request) {
        $pizza=_pizza::all();
        $zamowieniosy=zamowienia::all();
        $user = Auth::user();
        $user->ulica=$request->ulica;
        $user->save();
        $user->update();
        return view('home',compact('user','zamowieniosy','pizza'))->withTitle('kanapka');    }
    public function name(NameRequest $request){
        $pizza=_pizza::all();
        $zamowieniosy=zamowienia::all();
        $user = Auth::user();
        $user->name=$request->name;
        $user->save();
        $user->update();
        return view('home',compact('user','zamowieniosy','pizza'))->withTitle('kanapka');
    } 
    public function doladowanie(DoladowanieRequest $request){
        $pizza=_pizza::all();
        $zamowieniosy=zamowienia::all();
        $user = Auth::user();
        $user->saldo=$user->saldo + $request->doladowanie;
        $user->save();
        $user->update();        
        return view('home',compact('user','zamowieniosy','pizza'))->withTitle('kanapka');
    }
    public function zamawiam(){

        
        $pizza=_pizza::all();
        $user=Auth::user();
        $suma = 0.00;
        $koszykwyslij=ZamowienieModel::all();
        $zamowieniosy=zamowienia::all();
        $cena=0.00;
        $zamowienieCena=DB::table('koszyk')->SELECT('cena')->WHERE('userID',$user->id)->pluck('cena');
        $zamowienie=DB::table('koszyk')->SELECT('nazwa')->WHERE('userID',$user->id)->pluck('nazwa');
        
        if($user->miejscowosc ==NULL || $user->mieszkanie ==NULL || $user->ulica ==NULL){
            return view('home',compact('user','zamowieniosy','pizza'))->withTitle('XD');
        }
       
        if($user->saldo < $user->wartosckoszyka)
        {
            
            return view('zamowienia',compact('user','pizza','suma','koszykwyslij','zamowienie','cena','zamowienieCena'))->withTitle('biedak');
        }
        else{
            $user->saldo -= $user->wartosckoszyka;
        }

        foreach($koszykwyslij as $koszykwyslij)
        {
        if($koszykwyslij->userID!= $user->id) continue;
        $zamowieniosy=new zamowienia;
        $zamowieniosy->pizzaName=$koszykwyslij->nazwa;
        $zamowieniosy->userID=$user->id;
        $zamowieniosy->rozmiar=$koszykwyslij->rozmiar;
        $zamowieniosy->save();
        $zamowieniosy->update();
        }
        




         
        DB::table('koszyk')->WHERE('userID','=',$user->id)->DELETE();
        $user->wartosckoszyka=0.00;
        $user->save();
        $user->update();
        $zamowienieCena=DB::table('koszyk')->SELECT('cena')->WHERE('userID',$user->id)->pluck('cena');
        $zamowienie=DB::table('koszyk')->SELECT('nazwa')->WHERE('userID',$user->id)->pluck('nazwa');
        
       
        return view('zamowienia',compact('user','pizza','suma','koszykwyslij','zamowienie','cena','zamowienieCena'))->withTitle('bogacz');
    }
    public function usunPizze(PizzaRequest $request)
    {
        $user=Auth::user();
        $zamowieniosy=zamowienia::all();
        $pizza=_pizza::all();
        DB::table('_pizza')->WHERE('nazwa','=',$request->pizzaAdminUsuwanie)->DELETE();
        return view('home',compact('user','zamowieniosy','pizza'))->withTitle('kanapka');
    }  
    public function dodajPizze(PizzaAddRequest $request)
    {
        $user=Auth::user();
        $zamowieniosy=zamowienia::all();
        
        $dodaj= new _pizza;

        $dodaj->nazwa=$request->addNazwa;
        $dodaj->cenaMala=$request->addCenaMala;
        $dodaj->cenaSrednia=$request->addCenaSrednia;
        $dodaj->cenaDuza=$request->addCenaDuza;
        $dodaj->opis=$request->addOpis;
        $dodaj->kategoria=$request->addKategoria;
        $dodaj->save();
        $dodaj->update();
        $pizza=_pizza::all();
        return view('home',compact('user','zamowieniosy','pizza'))->withTitle('kanapka');
    }


}
