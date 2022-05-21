<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etemplate extends Model
{
    protected $table = 'etemplates';
    protected $fillable = array( 'esender','emessage', 'smsapi');
}
