<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Depot;
class DepotController extends Controller
{
    public function create(){
        $isEdit=false;
        return view('setup.depot.create',compact($isEdit,'isEdit'));
    }

    public function index(){
        $depot=Depot::all();
        return view('setup.depot.depot',compact($depot,'depot'));
    }

    public function store(Request $request){

        $request->validate([
            'code'        =>  'required',
            'name'        =>  'required',
            'address'     =>  'required',
            'contact_no'  =>    'required|numeric',
            'contact_person'       =>  'required|numeric',
        ]);
        $depot=new Depot;
        $depot->name=$request->name;
        $depot->address=$request->address;
        $depot->contact_no=$request->contact_no;
        $depot->code=$request->code;
        $depot->contact_person=$request->contact_person;
        $depot->user_id='1';
        $depot->save();
        return redirect()->route('depot');
    }

    public function edit($id){
        $isEdit=true;
        $depot=Depot::find($id);
        return view('setup.depot.create',compact($depot,'depot',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'code'        =>  'required',
            'name'        =>  'required',
            'address'     =>  'required',
            'contact_no'  =>    'required|numeric',
            'contact_person'       =>  'required|numeric',
        ]);
        $depot=Depot::find($id);
        $depot->name=$request->name;
        $depot->address=$request->address;
        $depot->contact_no=$request->contact_no;
        $depot->code=$request->code;
        $depot->contact_person=$request->contact_person;
        $depot->user_id='1';
        $depot->save();
        return redirect()->route('depot');
    }
}
