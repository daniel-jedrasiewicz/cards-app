<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = ['card_number', 'pin', 'activation_date', 'expiration_date', 'balance'];

    protected function balance(): Attribute
    {
        return Attribute::make(
            get: fn(int $value) => $value / 100,
            set: fn(int $value) => $value * 100
        );
    }
}
