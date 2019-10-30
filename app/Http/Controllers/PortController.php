<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Port;
use App\PortCharges;
use App\Charges;
class PortController extends Controller
{
    public function create(){
        $isEdit=false;
        $charges=Charges::all();
        return view('setup.port.create',compact($isEdit,'isEdit',$charges,'charges'));
    }

    public function index(){
        $port=Port::with('port_charges.charges')->get();
        return view('setup.port.port',compact($port,'port'));
    }

    public function store(Request $request){


        $request->validate([
            'code'        =>  'required',
            'name'     =>  'required',
            'address'  =>    'required',
            'amount'  =>    'required',
        ]);
//         $data = $request->all();
// $finalArray = array();
// foreach($data as $key=>$value){
//    array_push($finalArray, array(
//     'code'=>$value['code'],
//     'description'=>$value['description'],
//     'charge_type'=>$value['charge_type'],
//    ));
// }

// Charesg::insert($finalArray);
        // $codes=$request->code;
        // $description=$request->description;
        // $charge_type=$request->charge_type;
        // foreach($codes as $code){
        //     $data=array(
        //         'code'         =>   $code,
        //         'description'  =>   $request->description,
        //         'charge_type'  =>   $request->charge_type,
        //     );
        // }
        // port::create($data);
            $port=new Port;
            $port->code=$request->code;
            $port->name=$request->name;
            $port->address=$request->address;
            $port->save();
            if($port->id){
            $portcharges=new PortCharges;
            $portcharges->port_id=$port->id;
            $portcharges->charges_id=$request->charges_id;
            $portcharges->amount=$request->amount;
            $portcharges->save();
           }
        return redirect()->route('port');
    }

    public function edit($id){
        $isEdit=true;
        $port=Port::find($id);
        $port_charges=PortCharges::where('port_id',$id)->first();
        $charges=Charges::all();
        return view('setup.port.create',compact($isEdit,'isEdit',$charges,'charges',$port,'port',$port_charges,'port_charges'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'code'        =>  'required',
            'name'     =>  'required',
            'address'  =>    'required',
            'amount'  =>    'required',
        ]);
        $port=Port::find($id);
        $port->code=$request->code;
        $port->name=$request->name;
        $port->address=$request->address;
        $port->save();
        $portcharges=PortCharges::find($port->id);
        $portcharges->port_id=$port->id;
        $portcharges->charges_id=$request->charges_id;
        $portcharges->amount=$request->amount;
        $portcharges->save();
        return redirect()->route('port');
    }
}
