<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    // whitelisting all table fields
    protected $fillable = [
        'increment_id',
        'id',
        'updated_at',
        'customer_id',
        'customer_email',
        'status',
        'marking',
        'grand_total',
        'subtotal',
        'tax_amount',
        'billing_address_id',
        'shipping_address_id',
        'shipping_method',
        'shipping_amount',
        'shipping_tax_amount',
        'shipping_description',
        'items',
    ];
}
