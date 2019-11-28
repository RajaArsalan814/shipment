<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\Port;
use App\Charges;
use App\AgentCharges;
class AgentController extends Controller
{
    public function create(){
        $charges_import=Charges::where('charge_type','I')->get();
        $charges_export=Charges::where('charge_type','E')->get();
        $port=Port::get();
        $charges=Charges::get();
        return view('setup.agent.create',compact($port,'port',$charges,'charges',$charges_import,'charges_import',$charges_export,'charges_export'));
    }
    public function index(){
        // $agent=Agent::all();
        // $port=Port::all();
       $agent=Agent::with('agent_charges','ports')->get();
        return view('setup.agent.agent',compact($agent,'agent',$agent,'agent'));
    }
    public function store(Request $request){
        // return $request->all();
        // $request->validate([
        //     'code'               =>  'required',
        //     'description'        =>  'required',
        //     'cost'               =>  'required|numeric',
        //     'supplier'           =>  'required',
        // ]);

        $agent=new Agent;
        $agent->code=$request->code;
        $agent->name=$request->name;
        $agent->address=$request->address;
        $agent->contact_no=$request->contact_no;
        $agent->fax_no=$request->fax_no;
        $agent->email=$request->email;
        $agent->contact_person=$request->contact_person;
        $agent->user_name=$request->user_name;
        $agent->port_id=$request->port_id;
        $charges=$request->charges_id;
        $amount=$request->amount;
        $agent->save();


        if(count($request->charges_id) > 0)
        {
            foreach($request->charges_id as $item=>$v){
                $data2=array(
                    'agent_id'=>$agent->id,
                    'charges_id'=>$request->charges_id[$item],
                    'amount'=>$request->amount[$item],
                );
                AgentCharges::insert($data2);

            }
        }
        return redirect()->route('agent');
    }

    public function edit($id){
        
        $agent=Agent::find($id);
        $charges_import=Charges::where('charge_type','I')->get();
        $charges_export=Charges::where('charge_type','E')->get();
        $agent_charges=AgentCharges::where('agent_id',$id)->first();
        $charges=Charges::all();
        $port=Port::all();
        return view('setup.agent.agent_edit',compact($charges,'charges',$agent,'agent',$agent_charges,'agent_charges',
        $charges_import,'charges_import',$charges_export,'charges_export',$port,'port'));
    
    }

    public function update(Request $request,$id){
    
        $agent=Agent::find($id);
        $agent->name=$request->name;
        $agent->address=$request->address;
        $agent->contact_no=$request->contact_no;
        $agent->code=$request->code;
        $agent->contact_person=$request->contact_person;
        $agent->user_id='1';
        $agent->update();
     
        $agent_charges_delete=AgentCharges::where('agent_id',$agent->id)->delete();
      
        if($agent){
            if(count($request->charges_id) > 0)
            {
                foreach($request->charges_id as $item=>$v){
                    $data2=array(
                        'agent_id'=>$agent->id,
                        'charges_id'=>$request->charges_id[$item],
                        'amount'=>$request->amount[$item],
                    );
                    AgentCharges::insert($data2);
    
                }
            }
        }
     
        return redirect()->route('agent');
    }

    public function agent_view($id){

        // $port=Port::find($id);
        // $port_charges=PortCharges::with('charges')->where('port_id',$id)->get();


        $agent=Agent::with('ports')->find($id);
        $agent_charges=AgentCharges::with('charges')->where('agent_id',$id)->get();
        // $export_charges=PortCharges::where('port_id',$id)->get();
        return view('setup.agent.agent_view',compact($agent_charges,'agent_charges',$agent,'agent'));
    }
}
