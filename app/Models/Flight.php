<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'serie',
        'session',
        'category_id',
        'date',
        'start',
        'end',
        'limit'
    ];

    protected $appends = ['category'];

    public function category()  {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getCategoryAttribute()
    {
        return $this->category()->first();
    }

    public function participants()  {
        return $this->hasMany(Participant::class, 'flight_id', 'id');
    }

}
