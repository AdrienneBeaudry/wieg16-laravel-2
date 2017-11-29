<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property int $increment_id
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $customer_id
 * @property string $customer_email
 * @property string $status
 * @property string $marking
 * @property float $grand_total
 * @property float $subtotal
 * @property float $tax_amount
 * @property int $billing_address_id
 * @property int $shipping_address_id
 * @property string $shipping_method
 * @property float $shipping_amount
 * @property float $shipping_tax_amount
 * @property string $shipping_description
 * @property string $items
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereBillingAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCustomerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereIncrementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereItems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereMarking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereShippingAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereShippingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereShippingDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereShippingMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereShippingTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $items_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereItemsId($value)
 */
class Order extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    // whitelisting all table fields
    protected $fillable = [
        'increment_id',
        'id',
        'created_at',
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
    ];
}
