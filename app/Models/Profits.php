<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profits extends Model {
    protected $table = "profits";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function plan()
    {
        return $this->belongsTo('App\Models\Plans','plan_id');
    }
}
