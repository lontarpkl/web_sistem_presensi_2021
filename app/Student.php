<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guarded = ['id'];
    protected $guard = 'student';
    public $incrementing = false;

    protected $table = "students";
    protected $primaryKey = 'rfid';
    protected $fillable = [
        'nis', 'nisn', 'rfid','name', 'photo', 'gender', 'id_class', 'address', 'parents_phone', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function clients() {
        return $this->hasMany(Passport::clientModel(), 'user_id', 'rfid');
    } 
    // Gender accessor
    public function getFilterGenderAttribute()
    {
        return $this->gender == 0 ? 'Laki - Laki' : 'Perempuan';
    }

    public function presents() {
        return $this->hasMany(Presences::class, 'rfid_id');
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_class');
    }
}
