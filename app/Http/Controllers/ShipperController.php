<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipper;
class ShipperController extends Controller
{
    public function create(){
        $isEdit=false;
        return view('setup.shipper.create',compact($isEdit,'isEdit'));
    }

    public function index(){
        $shipper=Shipper::all();
        return view('setup.shipper.shipper',compact($shipper,'shipper'));
    }

    public function store(Request $request){

        $request->validate([
            'name'        =>  'required',
            'address'     =>  'required',
            'contact_no'  =>    'required|numeric',
            'fax_no'      =>  'required',
            'email'       =>  'required',
            'contact_person'       =>  'required|numeric',
        ]);
        $shipper=new Shipper;
        $shipper->name=$request->name;
        $shipper->address=$request->address;
        $shipper->contact_no=$request->contact_no;
        $shipper->fax_no=$request->fax_no;
        $shipper->email=$request->email;
        $shipper->contact_person=$request->contact_person;
        $shipper->user_id='1';
        $shipper->save();
        return redirect()->route('shipper');
    }

    public function edit($id){
        $isEdit=true;
        $shipper=Shipper::find($id);
        return view('setup.shipper.create',compact($shipper,'shipper',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){

        $shipper=Shipper::find($id);
        $shipper->name=$request->name;
        $shipper->address=$request->address;
        $shipper->contact_no=$request->contact_no;
        $shipper->fax_no=$request->fax_no;
        $shipper->email=$request->email;
        $shipper->contact_person=$request->contact_person;
        $shipper->user_id='1';
        $shipper->save();
        return redirect()->route('shipper');
    }
}
