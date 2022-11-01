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
//        $spells = Spell::all();
$spells = Spell::where('activity', '=', '1')->get();

        return view('spell.index', compact('spells')
        );
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

    public function show (Spell $spell){
        return view('spell.show', [

            'spell' => $spell
        ]);
    }

    public function edit(Spell $spell)
    {
        return view('spell.edit',compact('spell'));
    }

    public function update(Request $request, $id){
       //validaten wat ingevuld moet worden
        $request->validate([
            'spell_name' => 'required',
            'spell_type' => 'required',
            'damage'=>['required', 'numeric'],
            'details'=>'required',
            'file_path'=> 'required',
        ]);

        $request->file('file_path')->storePublicly('file_path', 'public');

        $spell = Spell::find($id);
        $spell->spell_name = $request->get('spell_name');
        $spell->spell_type = $request->get('spell_type');
        $spell->damage = $request->get('damage');
        $spell->details = $request->get('details');
        $spell->file_path = $request->file('file_path')->hashName();
        $spell->save();

        return redirect()->route('spell.index');
    }

    public function destroy(Spell $spell){
        $spell->delete();

        return redirect()->route('spell.index');

    }

    protected function getSpell()
    {
        //simple search functie
//        return Spell::latest()->filter()->get();
        $spells = Spell::latest();

        if (request('search')) {
            $spells->where('spell_type', 'like', '%' . request('search') . '%')
                   ->orWhere('spell_name', 'like', '%' . request('search') . '%');
        }
            return $spells->get();
    }

//   public function toggleActivity(Request $request){
//       $spell = Spell::find($request->spell_id);
//       $spell->activity = $request->activity;
//       $spell->save();
//   }

    public function toggleActivity(Spell $spell)
    {

        $currentState = $spell->activity;
        if ($currentState)
        {
            $newState = false;
        } else
        {
            $newState = true;
        }

        $spell->activity = $newState;
        $spell->save();

        return redirect(route('spell.index'));
    }

}
