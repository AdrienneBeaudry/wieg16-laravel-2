<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Group
 *
 * @property int $customer_group_id
 * @property string|null $customer_group_code
 * @property int|null $tax_class_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCustomerGroupCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCustomerGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereTaxClassId($value)
 * @mixin \Eloquent
 */
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
