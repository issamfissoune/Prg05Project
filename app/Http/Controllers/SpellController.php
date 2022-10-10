<?php

namespace App\Http\Controllers;

use App\Models\Spell;
use App\Models\User;
use Illuminate\Http\Request;

class SpellController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {

//        auth(User::class);
        $spells = Spell::all();

        return view('spell.index', [ // TODO: verplaatsen
            'spells' => $spells
        ]);
    }
    //
    public function create(){
        return view('spell.create');
    }

    public function store(Request $request){

        $request->validate([
            'spell_name' => 'required',
            'spell_type' => 'required',
            'damage'=>['required', 'numeric'],
            'details'=>'required'
        ]);

        Spell::create(array_merge($request->all(), [
            'user_id' => \Auth::user()->id
        ]));

        return redirect()->route('spell.index');
    }

}
