<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CarWash extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type_id',
        'carwash_code',
        'name',
        'slug',
        'description',
        'price',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }

            if (empty($model->carwash_code)) {
                $lastId = CarWash::max('id') + 1;
                $model->carwash_code = 'CW' . str_pad($lastId, 3, '0', STR_PAD_LEFT);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('name')) {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    public function type()
    {
        return $this->belongsTo(CarWashType::class, 'type_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
