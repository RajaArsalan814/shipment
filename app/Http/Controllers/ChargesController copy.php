<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charges;
class ChargesController extends Controller
{
    public function create(){
        $isEdit=false;
        return view('setup.charges.create',compact($isEdit,'isEdit'));
    }

    public function index(){
        $charges=Charges::all();
        return view('setup.charges.charges',compact($charges,'charges'));
    }

    public function store(Request $request){

        // return $request->all();
        $request->validate([
            'code'        =>  'required',
            'description'     =>  'required',
            'charge_type'  =>    'required',
        ]);
        $charges=new Charges;
        $charges->code=$request->code;
        $charges->description=$request->description;
        $charges->charge_type=$request->charge_type;
        $charges->save();
        return redirect()->route('charges');
    }

    public function edit($id){
        $isEdit=true;
        $charges=charges::find($id);
        return view('setup.charges.create',compact($charges,'charges',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'code'        =>  'required',
            'description'     =>  'required',
            'charge_type'  =>    'required',
        ]);
        $charges=Charges::find($id);
        $charges->code=$request->code;
        $charges->description=$request->description;
        $charges->charge_type=$request->charge_type;
        $charges->save();
        return redirect()->route('charges');
    }
}
