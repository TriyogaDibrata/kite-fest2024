<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'participant_id',
        'path',
        'full_path'
    ];

    protected $appends = ['participant'];

    public function participant() {
        return $this->belongsTo(Participant::class, 'participant_id', 'id');
    }

    public function getParticipantAttribute() {
        return $this->participant()->first();
    }
}
