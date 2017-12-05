<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    // whitelisting all table fields
    protected $fillable = [
        'customer_group_id',
        'customer_group_code',
        'tax_class_id',
    ];
}
