<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presences extends Model
{
    protected $table = "presences";
    protected $fillable = [
        'rfid_id',  'tanggal', 'jam', 'kehadiran', 'keterangan'
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'rfid_id');
    }

    public function clients() {
        return $this->hasMany(Passport::clientModel(), 'user_id', 'rfid');
    } 
}
