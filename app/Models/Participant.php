<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'address',
        'phone',
        'category_id',
        'flight_id',
        'number',
        'chest_no',
        'slug',
        'status'
    ];

    protected $appends = ['category', 'flight'];

    public function category()  {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function flight()  {
        return $this->belongsTo(Flight::class, 'flight_id', 'id');
    }

    public function getCategoryAttribute()
    {
        return $this->category()->first();
    }

    public function getFlightAttribute()
    {
        return $this->flight()->first();
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $category = Category::findOrFail($model->category_id);
            $number = Participant::where('category_id', $model->category_id)->withTrashed()->max('number') + 1;
            $model->number = $number;
            $model->chest_no = $category->acronym . '-' . str_pad($number, $category->chest_no_digits, $category->chest_no_prefix, STR_PAD_LEFT);
        });
    }
}
