<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recap extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'recaps'; 

    protected $guarded = ['id'];
    
    protected $fillable = [
        'category_id',
        'desc'
    ];

    protected $appends = ['category'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getCategoryAttribute() {
        return $this->category()->first();
    }

    public function recap_detail() {
        return $this->hasMany(RecapDetail::class, 'recap_id', 'id');
    }
}
