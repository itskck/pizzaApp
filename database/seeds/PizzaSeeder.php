<?php

use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('_Pizza')->insert([
            'nazwa' => 'Z szynka',
            'cenaMala'  => 10,
            'cenaSrednia'  => 15,
            'cenaDuza'  => 22,
            'kategoria'  => 'miesne',
            'opis'  => '_Pizza z szynka, co tu duzo mowic',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => 'Z salami',
            'cenaMala'  => 12,
            'cenaSrednia'  => 17,
            'cenaDuza'  => 25,
            'kategoria'  => 'miesne',
            'opis'  => 'Taka jak z szynka, tylko ze inna',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => 'Z kurczakiem',
            'cenaMala'  => 15,
            'cenaSrednia'  => 18,
            'cenaDuza'  => 25,
            'kategoria'  => 'miesne',
            'opis'  => 'Z kurczakiem a w bonusie nawet kukurydza',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => 'Z kebabem',
            'cenaMala'  => 15,
            'cenaSrednia'  => 21,
            'cenaDuza'  => 28,
            'kategoria'  => 'miesne',
            'opis'  => 'Niechciane dziecko wloch i turcji',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => 'Z lososiem',
            'cenaMala'  => 18,
            'cenaSrednia'  => 25,
            'cenaDuza'  => 30,
            'kategoria'  => 'miesne',
            'opis'  => 'Ryba robi bul bul',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => 'Z pomidorami i serem',
            'cenaMala'  => 11,
            'cenaSrednia'  => 15,
            'cenaDuza'  => 19,
            'kategoria'  => 'wege',
            'opis'  => 'Prosto z toskani!',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => '4 sery',
            'cenaMala'  => 13,
            'cenaSrednia'  => 18,
            'cenaDuza'  => 22,
            'kategoria'  => 'wege',
            'opis'  => 'Czasem nawet 5 jak sie poszczesci',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => 'Z feta i oliwkami',
            'cenaMala'  => 15,
            'cenaSrednia'  => 21,
            'cenaDuza'  => 27,
            'kategoria'  => 'wege',
            'opis'  => 'No wlasnie taka',
            'sciezka'  => ' '
                 ]);         
        DB::table('_Pizza')->insert([
            'nazwa' => 'Margaritta',
            'cenaMala'  => 10,
            'cenaSrednia'  => 12,
            'cenaDuza'  => 14,
            'kategoria'  => 'wege',
            'opis'  => 'Polecamy przy niskim budzecie',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => 'Z pomidorami',
            'cenaMala'  => 7,
            'cenaSrednia'  => 10,
            'cenaDuza'  => 13,
            'kategoria'  => 'vegan',
            'opis'  => 'Tym razem bez sera',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => 'Z orzechami',
            'cenaMala'  => 9,
            'cenaSrednia'  => 12,
            'cenaDuza'  => 15,
            'kategoria'  => 'vegan',
            'opis'  => 'To chyba nienajlepszy pomysl',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => 'Z baklazanem',
            'cenaMala'  => 12,
            'cenaSrednia'  => 14,
            'cenaDuza'  => 19,
            'kategoria'  => 'vegan',
            'opis'  => 'Mniam',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => 'Z bananem',
            'cenaMala'  => 11,
            'cenaSrednia'  => 16,
            'cenaDuza'  => 20,
            'kategoria'  => 'vegan',
            'opis'  => 'Kto to wymysla',
            'sciezka'  => ' '
                 ]);
        DB::table('_Pizza')->insert([
            'nazwa' => 'Samo ciasto',
            'cenaMala'  => 5,
            'cenaSrednia'  => 7,
            'cenaDuza'  => 9,
            'kategoria'  => 'vegan',
            'opis'  => 'Szalenstwo',
            'sciezka'  => ''
                 ]);                                                      
                 
                 
    }
}
