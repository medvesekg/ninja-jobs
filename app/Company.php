<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_name', 'company_address', 'logo_id'
    ];

    public function logo() {
        return $this->belongsTo('App\Logo');
    }

    public function user() {
        return $this->hasOne('App\User');
    }

    public function job() {
        return $this->hasMany('\App\Job');
    }
}
