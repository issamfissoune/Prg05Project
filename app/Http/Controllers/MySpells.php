<?php

namespace App\Http\Controllers;

use App\Models\Spell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MySpells extends Controller
{
   public function index(){
       $spells = Spell::where('user_id', '=', auth::user()->id)->get();

       return view('mySpell.index', [
           'spells' => $spells
       ]);
   }

}
