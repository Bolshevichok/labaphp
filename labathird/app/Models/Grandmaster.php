<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Transliterator;


class Grandmaster extends Model
{
    use HasFactory;
    use SoftDeletes;
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

    public function set($key, $value)
    {
        if ($key === 'birth_date') {
            $this->attributes['birth_date'] = Carbon::parse($value)->format('Y-m-d');
        } else {
            parent::set($key, $value);
        }
    }

    // Мутатор для поля 'name'
    public function setNameAttribute($value)
    {
        if ($value !== null && $value !== '') {
            $value = mb_convert_encoding($value, 'UTF-8', 'auto');
            $transliterator = Transliterator::create('Any-Lower; Any-Title');
            $this->attributes['name'] = $transliterator->transliterate($value);
        }
    }

    // Мутатор для поля 'country'
    public function setCountryAttribute($value)
    {
        if ($value) {
            $transliterator = Transliterator::create('Any-Lower; Any-Title');
            $this->attributes['country'] = $transliterator->transliterate($value);
        }
    }

    // Мутатор для поля 'max_rating'
    public function setMaxRatingAttribute($value)
    {
        $this->attributes['max_rating'] = min((int)$value, 3000);
    }

    // Мутатор для поля 'image_path'
    public function setImagePathAttribute($value)
    {
        $this->attributes['image_path'] = strtolower($value);
    }

    // Мутатор для поля 'info'
    public function setInfoAttribute($value)
    {
        $this->attributes['info'] = strip_tags($value);
    }

    public function getBirthDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}