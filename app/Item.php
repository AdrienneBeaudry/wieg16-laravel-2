<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Item
 *
 * @property int $id
 * @property string $order_id
 * @property int $item_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $sku
 * @property int $qty
 * @property float $price
 * @property float $tax_amount
 * @property float $row_total
 * @property float $price_incl_tax
 * @property float $total_incl_tax
 * @property float $tax_percent
 * @property int $amount_package
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereAmountPackage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item wherePriceInclTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereRowTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereTaxPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereTotalInclTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Item extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'order_id',
        'item_id',
        'created_at',
        'updated_at',
        'name',
        'sku',
        'qty',
        'price',
        'tax_amount',
        'row_total',
        'price_incl_tax',
        'total_incl_tax',
        'tax_percent',
        'amount_package',
    ];

    public function customerAddresses() {
        return $this->hasMany(CustomerAddress::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function customer() {
        return $this->hasMany(Customer::class);
    }
}
