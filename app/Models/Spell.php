<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    use HasFactory;

    protected $fillable = [
        'spell_name',
        'spell_type',
        'damage',
        'details',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

}
