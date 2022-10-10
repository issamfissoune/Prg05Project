<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spell;

class Index extends Controller
{

public function show(){
   $spells = Spell::all();

   return view('index', [
       'spells' =>$spells
   ]);

}

}
