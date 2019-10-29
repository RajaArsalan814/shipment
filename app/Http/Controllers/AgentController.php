<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
class AgentController extends Controller
{
    public function create(){
        $isEdit=false;
        return view('setup.agent.create',compact($isEdit,'isEdit'));
    }
    public function index(){
        $agent=agent::all();
        return view('setup.agent.agent',compact($agent,'agent'));
    }
    public function store(Request $request){
        $request->validate([
            'code'               =>  'required',
            'description'        =>  'required',
            'cost'               =>  'required|numeric',
            'supplier'           =>  'required',
        ]);

        $agent=new Agent;
        $agent->code=$request->code;
        $agent->description=$request->description;
        $agent->agent_type_id=$request->agent_type_id;
        $agent->cost=$request->cost;
        $agent->company_id=$request->company_id;
        $agent->pur_port_id=$request->pur_port_id;
        $agent->supplier=$request->supplier;
        $agent->save();
        return redirect()->route('agent');
    }

    public function edit($id){
        $isEdit=true;
        $agent=Agent::find($id);
        return view('setup.agent.create',compact($agent,'agent',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'code'               =>  'required',
            'description'        =>  'required',
            'cost'               =>  'required|numeric',
            'supplier'           =>  'required',
        ]);
        $agent=Agent::find($id);
        $agent->name=$request->name;
        $agent->address=$request->address;
        $agent->contact_no=$request->contact_no;
        $agent->code=$request->code;
        $agent->contact_person=$request->contact_person;
        $agent->user_id='1';
        $agent->save();
        return redirect()->route('agent');
    }
}
