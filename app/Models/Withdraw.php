<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model {
    protected $table = "w_history";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function wallet()
    {
        return $this->belongsTo('App\Models\Withdrawm','coin_id');
    }
}
