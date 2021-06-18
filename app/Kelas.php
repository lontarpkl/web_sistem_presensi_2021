<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Kelas extends Model
{
    protected $table = "class";

    protected $fillable = [
        'class',
    ];

    public function student() {
        return $this->hasMany(Student::class,'id_class');
    }
    
}
