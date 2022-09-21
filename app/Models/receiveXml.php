<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class receiveXml extends Model
{
    protected $fillable = ['jobid', 'acid',  'recipient','content','language','status','timestamp','senderid '];

    protected $hidden = [];
}
