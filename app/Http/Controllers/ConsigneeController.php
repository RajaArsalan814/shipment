<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consignee;
class ConsigneeController extends Controller
{
    public function create(){
        $isEdit=false;
        return view('setup.consignee.create',compact($isEdit,'isEdit'));
    }

    public function index(){
        $consignee=Consignee::all();
        return view('setup.consignee.consignee',compact($consignee,'consignee'));
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
        $consignee=new Consignee;
        $consignee->name=$request->name;
        $consignee->address=$request->address;
        $consignee->contact_no=$request->contact_no;
        $consignee->fax_no=$request->fax_no;
        $consignee->email=$request->email;
        $consignee->contact_person=$request->contact_person;
        $consignee->user_id='1';
        $consignee->save();
        return redirect()->route('consignee');
    }

    public function edit($id){
        $isEdit=true;
        $consignee=Consignee::find($id);
        return view('setup.consignee.create',compact($consignee,'consignee',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){

        $consignee=Consignee::find($id);
        $consignee->name=$request->name;
        $consignee->address=$request->address;
        $consignee->contact_no=$request->contact_no;
        $consignee->fax_no=$request->fax_no;
        $consignee->email=$request->email;
        $consignee->contact_person=$request->contact_person;
        $consignee->user_id='1';
        $consignee->save();
        return redirect()->route('consignee');
    }
}
