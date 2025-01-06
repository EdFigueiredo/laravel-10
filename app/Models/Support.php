<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\SupportStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject', 
        'body',
        'status'
    ];

    // protected $casts = [
    //     'status' => SupportStatus::class,
    // ];

    public function status() : Attribute
    {
        return Attribute::make(
            set: fn  (SupportStatus $value) => $value->name
        );
    }
}
