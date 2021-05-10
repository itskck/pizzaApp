<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZamowienieModel extends Model
{
    protected $table = 'koszyk';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nazwa', 'cena','rozmiar',
    ];
}
