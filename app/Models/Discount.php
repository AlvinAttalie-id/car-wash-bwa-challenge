<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Discount extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'slug',
        'description',
        'percentage',
        'valid_from',
        'valid_until',
    ];

    protected $casts = [
        'valid_from' => 'date',
        'valid_until' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->code);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('code')) {
                $model->slug = Str::slug($model->code);
            }
        });
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
