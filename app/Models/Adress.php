<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Adress
 * 
 * @package App\Models
 * @property int $id
 * @property string $adress_by_customer
 * @property string $city
 * @property string $street
 * @property string $house
 * @property int $floor
 * @property int $flat
 * @property int $customer_id
 * @property Carbon\Carbon $created_at - дата и время создания
 * @property Carbon\Carbon $updated_at - дата и время обновления
 */
class Adress extends Model
{
    use HasFactory;
}
