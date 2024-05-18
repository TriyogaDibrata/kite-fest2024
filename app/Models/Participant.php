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
}
