<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class messagedetailsaving extends Model
{
    protected $fillable = ['id','jobid', 'acid', 'senderID'];

    protected $hidden = [];

    


}