<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GroupePrice
 *
 * @property-read \App\Group $group
 * @mixin \Eloquent
 */
class GroupePrice extends Model
{
    public $incrementing = false; //or should it be true??
    public $timestamps = false;

    // whitelisting all table fields
    protected $fillable = [
        'id',
        'price',
        'group_id',
        'price_id',
    ];

    public function group() {
        return $this->belongsTo(Group::class);
    }
}
