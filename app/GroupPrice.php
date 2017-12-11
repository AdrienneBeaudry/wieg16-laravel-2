<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GroupePrice
 *
 * @property-read \App\Group $group
 * @mixin \Eloquent
 * @property int $id
 * @property float|null $price
 * @property int|null $group_id
 * @property int|null $price_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPrice whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPrice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPrice wherePriceId($value)
 */
class GroupPrice extends Model
{
    public $incrementing = false; //or should it be true??
    public $timestamps = false;

    // whitelisting all table fields
    protected $fillable = [
        'id',
        'price',
        'group_id',
        'product_id',
    ];

    public function group() {
        return $this->belongsTo(Group::class);
    }
}
