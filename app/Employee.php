<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'company_id',
        'email',
        'phone'
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class, "company_id");

    }
}
