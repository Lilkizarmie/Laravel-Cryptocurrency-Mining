<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposits extends Model {
    protected $table = "deposits";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function gateway()
    {
        return $this->belongsTo('App\Models\Gateway','gateway_id');
    }
}
