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
        'user_id',
        "file_path"
    ];

//    public function scopeFilter ($query){
//        if (request('search')){
//            $query -> where('spell_type', 'like', '%'. request('search'). '%')
//                   -> orWhere('spell_name', 'like', '%'. request('search'). '%');
//        }
//    }


    public function user(){
        return $this->belongsTo(User::class);
    }

}
