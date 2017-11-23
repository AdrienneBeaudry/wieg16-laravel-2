<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Phone
 *
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
class Phone extends Model
{
    public function user() {
        // note, user:: class is a namespace, and it's the same as writing '\App\User'
        // don't understand this... look into this later.
        return $this->belongsTo(User::class);
    }
}
