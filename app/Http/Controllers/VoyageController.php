<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;
use App\ContainerLine;
use App\Port;
use App\ContainerType;
use App\Voyage;
use App\Vessel;
class VoyageController extends Controller
{
    public function create(){
        $isEdit=false;
        $vessel=Vessel::all();
        $port=Port::all();
        return view('setup.voyage.create',compact($isEdit,'isEdit',$port,'port',$vessel,'vessel'));
    }
    public function index(){
        $voyage=Voyage::with('port')->get();
        return view('setup.voyage.voyage',compact($voyage,'voyage'));
    }
    public function store(Request $request){
        $voyage=new Voyage;
        $voyage->code=$request->code;
        $voyage->vessel_id=$request->vessel_id;

        $voyage->etd_date=$request->etd_date;
        $voyage->eta_date=$request->eta_date;
        $voyage->loading_port_id=$request->loading_port_id;
        $voyage->destination_port_id=$request->destination_port_id;
        $voyage->final_destination=$request->final_destination;
        $voyage->slot_operator_id=$request->slot_operator_id;
        $voyage->slot_rate=$request->slot_rate;
        $voyage->slot_payment_by=$request->slot_payment_by;
        $voyage->terminal_name=$request->terminal_name;
        $voyage->thc_amount=$request->thc_amount;
        $voyage->slot_operation_paid=$request->slot_operation_paid;
        $voyage->save();
        return redirect()->route('voyage');
    }

    public function edit($id){
        $isEdit=true;
        $port=Port::all();
        $vessel=Vessel::all();
        $voyage=Voyage::with('port')->find($id);
        return view('setup.voyage.create',compact($voyage,'voyage',$isEdit,'isEdit',$port,'port',$vessel,'vessel'));
    }

    public function update(Request $request,$id){
        $voyage=Voyage::find($id);
        $voyage->code=$request->code;
        $voyage->vessel_id=$request->vessel_id;
  
        $voyage->etd_date=$request->etd_date;
        $voyage->eta_date=$request->eta_date;
        $voyage->loading_port_id=$request->loading_port_id;
        $voyage->destination_port_id=$request->destination_port_id;
        $voyage->final_destination=$request->final_destination;
        $voyage->slot_operator_id=$request->slot_operator_id;
        $voyage->slot_rate=$request->slot_rate;
        $voyage->slot_payment_by=$request->slot_payment_by;
        $voyage->terminal_name=$request->terminal_name;
        $voyage->thc_amount=$request->thc_amount;
        $voyage->slot_operation_paid=$request->slot_operation_paid;
        $voyage->save();
        return redirect()->route('voyage');
    }
}
