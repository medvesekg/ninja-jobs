<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = [
        'name',
        'body',
        'skills',
        'company_id',
    ];

    public function company() {
        return $this->belongsTo('App\Company');
    }
}
