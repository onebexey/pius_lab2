<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 * class Customer
 * 
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $phone
 * @property bool $blocked - заблокирован/доступен
 * @property Carbon\Carbon $created_at - дата и время создания
 * @property Carbon\Carbon $updated_at - дата и время обновления
 *
 * @property Illuminate\Support\Collection|Adress $adresses - адресса
 * 
 * @method static Illuminate\Database\Eloquent\Builder byBlocked(bool $blocked) - Отбирает по доступности
 * @method static Illuminate\Database\Eloquent\Builder byPhone(string $phone) - Отбирает по телефону
 * @method static Illuminate\Database\Eloquent\Builder byEmail(string $email) - Отбирает по почте
 * @method static Illuminate\Database\Eloquent\Builder byFullName(string $name) - Отбирает по имени(поиск идет и по фамилии)
 * 
 */
class Customer extends Model
{
    use HasFactory;


    public function adresses()
    {
        return $this->hasMany(Adress::class);
    }

    public function scopeByBlocked($query, bool $blocked)
    {
        return $query->where('blocked', $blocked);
    }

    public function scopeByPhone($query, string $phone)
    {
        return $query->where('phone', 'LIKE', '%' . $phone . '%');
    }

    public function scopeByEmail($query, string $email)
    {
        return $query->where('email', 'LIKE', '%'. $email . '%');
    }

    public function scopeByFullName($query, string $name)
    {
        return $query
            ->where('name', 'LIKE', '%' . $name . '%')
            ->orWhere('surname', 'LIKE', '%' . $name . '%');
    }
}
