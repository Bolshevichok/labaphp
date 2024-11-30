<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Grandmaster extends Model
{
    use HasFactory;

    protected $table = 'chess_grandmasters';

    protected $fillable = [
        'name',
        'country',
        'birth_date',
        'max_rating',
        'image_path',
        'info',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
    // protected $casts = [
    //     'birth_date' => 'date:Y-m-d', // Указывает, что формат даты должен быть без времени
    // ];
    

    //     public function get($key)
    // {
    //     if ($key === 'birth_date' && isset($this->attributes['birth_date'])) {
    //         return Carbon::parse($this->attributes['birth_date'])->format('Y-m-d');
    //     }
    //     return parent::get($key);
    // }

    public function set($key, $value)
    {
        if ($key === 'birth_date') {
            $this->attributes['birth_date'] = Carbon::parse($value)->format('Y-m-d');
        } else {
            parent::set($key, $value);
        }
    }
    public function getBirthDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }





}
