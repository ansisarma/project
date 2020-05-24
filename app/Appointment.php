<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'user_id','appointment_time'
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
}
