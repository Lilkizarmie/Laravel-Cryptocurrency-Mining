<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model {
    protected $table = "referral";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
