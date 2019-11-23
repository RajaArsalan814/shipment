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
        $charges_import=Charges::where('charge_type','I')->get();
        $charges_export=Charges::where('charge_type','E')->get();
        return view('setup.port.create',compact($isEdit,'isEdit',$charges_import,'charges_import',$charges_export,'charges_export'));
    }

    public function index(){
       $port=Port::with('port_charges.charges')->get();
        return view('setup.port.port',compact($port,'port'));
    }

    public function store(Request $request){


        return $request->all();

        $request->validate([
            'code'        =>  'required',
            'name'     =>  'required',
            'address'  =>    'required',
            'amount'  =>    'required',
            ]);

        $port=new Port;
        $port->code=$request->code;
        $port->name=$request->name;
        $port->address=$request->address;
        $amount=$request->amount;
        $charges=$request->charges_id;
        $port->save();

        if(count($request->charges_id) > 0)
        {
            foreach($request->charges_id as $item=>$v){
                $data2=array(
                    'port_id'=>$port->id,
                    'charges_id'=>$request->charges_id[$item],
                    'amount'=>$request->amount[$item],
                );
                PortCharges::insert($data2);

            }
        }

        return redirect()->route('port');
        // foreach($charges as $charge)
        // {
        //   $resource_data = array(
        //         'port_id' => $port->id,
        //         'charges_id' => $request->charges_id,
        //             'amount' => $request->amount,
        //     );
        //     PortCharges::create($resource_data);
        // }
        // // foreach($port as $item){
        //     $data=array(
        //         'port_id'   =>  $port->id,
        //         'charges_id'   =>  $charges,
        //         'amount'   =>  $amount,
        //     );
        // // }
        //     PortCharges::insert($data);
//       $data[]=$request->all();
//        foreach ($data as $key => $value)
//         {

// return            PortCharges::create([
//                 'port_id' =>    $port->id,
//                 'charges_id' => $value['charge_id'],

//             ]);
//         }

//         $data[] = $request->all();
//     foreach ($data as $key => $value) {
// return        PortCharges::create([
//      'port_id' => $port->id,
//      'charges_id' => $value['charges_id'],
//      'amount' => $value['amount'],
//      ]);
//     }



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
        //     $port=new Port;
        //     $port->code=$request->code;
        //     $port->name=$request->name;
        //     $port->address=$request->address;
        //     $port->save();
        //     if($port->id){
        //     $portcharges=new PortCharges;
        //     $portcharges->port_id=$port->id;
        //     $portcharges->charges_id=$request->charges_id;
        //     $portcharges->amount=$request->amount;
        //     $portcharges->save();
        //    }
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

    public function port_view($id){
        $port=Port::find($id);
        $port_charges=PortCharges::with('charges')->where('port_id',$id)->get();
        // $export_charges=PortCharges::where('port_id',$id)->get();
        return view('setup.port.port_view',compact($port_charges,'port_charges',$port,'port'));
    }
}
