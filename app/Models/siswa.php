<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;   

class siswa extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'siswa';
    protected $fillable = [
        'username', 
        'address'
    ];

    protected $hidden = [];
}
