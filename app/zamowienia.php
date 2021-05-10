<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class zamowienia extends Model
{
    protected $table = 'zamowienia';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userID', 'pizzaID','rozmiar',
    ];
}
