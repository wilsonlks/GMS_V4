<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sender extends Model
{
    protected $fillable = ['id', 'acid', 'recipient','content','language','SenderStatus'];

    protected $hidden = [];



    public $timestamps = false;

     public function setUpdatedAt($value)
    {
        return NULL;
    }

}
