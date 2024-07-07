<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecapDetail extends Model
{
    use HasFactory;

    protected $table = 'recap_details'; 

    protected $guarded = ['id'];
    
    protected $fillable = [
        'recap_id',
        'participant_id',
        'score_1',
        'score_2',
        'score_3',
        'note'
    ];

    protected $appends = ['participant', 'photo'];

    public function recap() {
        return $this->belongsTo(Recap::class, 'recap_id', 'id');
    }

    public function participant() {
        return $this->belongsTo(Participant::class, 'participant_id', 'id');
    }

    public function getPhotoAttribute() {
        $participant = $this->participant()->first();
        $photo = Photo::where('participant_id', $participant->id)->latest()->first();
        return $photo;
    }
    
    public function getParticipantAttribute() {
        return $this->participant()->first();
    }
}
