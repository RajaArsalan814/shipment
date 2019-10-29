<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forwarder;
class ForwarderController extends Controller
{
    public function create(){
        $isEdit=false;
        return view('setup.forwarder.create',compact($isEdit,'isEdit'));
    }

    public function index(){
        $forwarder=Forwarder::all();
        return view('setup.forwarder.forwarder',compact($forwarder,'forwarder'));
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
        $forwarder=new Forwarder;
        $forwarder->name=$request->name;
        $forwarder->address=$request->address;
        $forwarder->contact_no=$request->contact_no;
        $forwarder->fax_no=$request->fax_no;
        $forwarder->email=$request->email;
        $forwarder->contact_person=$request->contact_person;
        $forwarder->user_id='1';
        $forwarder->save();
        return redirect()->route('forwarder');
    }

    public function edit($id){
        $isEdit=true;
        $forwarder=Forwarder::find($id);
        return view('setup.forwarder.create',compact($forwarder,'forwarder',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){

        $forwarder=Forwarder::find($id);
        $forwarder->name=$request->name;
        $forwarder->address=$request->address;
        $forwarder->contact_no=$request->contact_no;
        $forwarder->fax_no=$request->fax_no;
        $forwarder->email=$request->email;
        $forwarder->contact_person=$request->contact_person;
        $forwarder->user_id='1';
        $forwarder->save();
        return redirect()->route('forwarder');
    }
}
