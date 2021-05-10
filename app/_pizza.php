<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _pizza extends Model
{
    protected $table = "_pizza";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nazwa', 'cenaMala','cenaSrednia','cenaDuza','kategoria','opis',
    ];
}
