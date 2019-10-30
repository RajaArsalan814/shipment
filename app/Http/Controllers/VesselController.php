<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vessel;
class VesselController extends Controller
{
    public function create(){
        $isEdit=false;
        return view('setup.vessel.create',compact($isEdit,'isEdit'));
    }

    public function index(){
        $vessel=Vessel::all();
        return view('setup.vessel.vessel',compact($vessel,'vessel'));
    }

    public function store(Request $request){

        // return $request->all();
        $request->validate([
            'code'        =>  'required',
            'name'     =>  'required',
            'owner'  =>    'required',
        ]);
       $vessel=new Vessel;
        $vessel->code=$request->code;
        $vessel->name=$request->name;
        $vessel->owner=$request->owner;
        $vessel->save();
        return redirect()->route('vessel');
    }

    public function edit($id){
        $isEdit=true;
        $vessel=Vessel::find($id);
        return view('setup.vessel.create',compact($vessel,'vessel',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'code'        =>  'required',
            'name'     =>  'required',
            'owner'  =>    'required',
        ]);
        $vessel=Vessel::find($id);
        $vessel->code=$request->code;
        $vessel->name=$request->name;
        $vessel->owner=$request->owner;
        $vessel->save();
        return redirect()->route('vessel');
    }
}
