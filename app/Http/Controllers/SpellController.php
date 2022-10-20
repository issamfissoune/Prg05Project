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
            'details'=>'required',

        ]);

        if ($request->hasFile('file_path')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);


            $request->file('file_path')->storePublicly('file_path', 'public');

//             Store the record, using the new file hashname which will be it's new filename identity.
            $spell = new Spell([
                "spell_name" => $request->get('spell_name'),
                "spell_type" => $request->get('spell_type'),
                "damage" => $request->get('damage'),
                "details" => $request->get('details'),
                "file_path" => $request->file('file_path')->hashName(),
                'user_id' => \Auth::user()->id
            ]);
            $spell->save(); // Finally, save the record.
        }

//        Spell::create(array_merge($request->all(), [
//            'user_id' => \Auth::user()->id
//        ]));

        return redirect()->route('spell.index');
    }

    public function destroy(Spell $spell){
        $spell->delete();

        return redirect()->route('spell.index');

    }



}
