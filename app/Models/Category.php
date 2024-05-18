<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'acronym',
        'price',
        'chest_no_prefix',
        'chest_no_digits'
    ];

    public function series() {
        return $this->hasMany(Flight::class, 'category_id', 'id');
    }

    public function participants() {
        return $this->hasMany(Participant::class, 'category_', 'id');
    }
}
