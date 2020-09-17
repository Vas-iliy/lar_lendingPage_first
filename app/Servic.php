<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servic extends Model
{
    public $table = 'services';
    protected $fillable = ['name', 'text', 'icon'];
}
