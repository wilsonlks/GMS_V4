<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $fillable = [ 'acid',  'loginid'
    ,'passwd'];

    protected $hidden = [];


    protected $primaryKey = "acid";


}
