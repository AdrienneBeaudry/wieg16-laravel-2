<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Customer
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $firstname
 * @property string|null $lastname
 * @property int|null $gender
 * @property int|null $customer_activated
 * @property int $group_id
 * @property int|null $company_id
 * @property string|null $customer_company
 * @property int|null $default_billing
 * @property int|null $default_shipping
 * @property int|null $is_active
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $customer_invoice_email
 * @property string|null $customer_extra_text
 * @property int|null $customer_due_date_period
 * @property int|null $address_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCustomerActivated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCustomerCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCustomerDueDatePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCustomerExtraText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCustomerInvoiceEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereDefaultBilling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereDefaultShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    // To read more about HOW to format and write your model, the best way is to click on the MODEL
    // and see what is possible and how the Model is written, so we know what options are available to us.
    // CMD + B

    // These two below have NO IMPACT on how the database will look like.
    // The only thing that these two do, their only function is to communicate
    // information to Laravel.
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'email',
        'firstname',
        'lastname',
        'gender',
        'customer_activated',
        'group_id',
        'company_id',
        'customer_company',
        'default_billing',
        'default_shipping',
        'is_active',
        'created_at',
        'updated_at',
        'customer_invoice_email',
        'customer_extra_text',
        'customer_due_date_period',
        'address_id',
    ];

    public function address() {
        return $this->hasOne(CustomerAddress::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function order() {
        return $this->hasMany(Order::class);
    }
}
