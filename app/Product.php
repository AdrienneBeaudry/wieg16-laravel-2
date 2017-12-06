<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property int $id
 * @property int|null $entity_type_id
 * @property int|null $attribute_set_id
 * @property string|null $type_id
 * @property int|null $sku
 * @property int|null $has_options
 * @property int|null $required_options
 * @property int|null $status
 * @property string|null $name
 * @property int|null $amount_package
 * @property float|null $price
 * @property int|null $is_salable
 * @property int|null $stock_item
 * @property string|null $group_prices_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GroupePrice[] $groupPrice
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAmountPackage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAttributeSetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereEntityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereGroupPricesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereHasOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereIsSalable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereRequiredOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereStockItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    // whitelisting all table fields
    protected $fillable = [
        'id',
        'entity_type_id',
        'attribute_set_id',
        'type_id',
        'sku',
        'has_options',
        'required_options',
        'status',
        'name',
        'amount_package',
        'price',
        'is_salable',
        'stock_item',
        'group_prices_id',
    ];

    public function groupPrice() {
        return $this->hasMany(GroupePrice::class);
    }

}
