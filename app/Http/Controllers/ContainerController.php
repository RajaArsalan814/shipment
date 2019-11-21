<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;
use App\ContainerLine;
use App\Port;
use App\ContainerType;
class ContainerController extends Controller
{
    public function create(){
        $isEdit=false;
        $container_line=ContainerLine::all();
        $container_type=ContainerType::all();
        $port=Port::all();
        return view('setup.container.create',compact($isEdit,'isEdit',$container_line,'container_line',$port,'port',$container_type,'container_type'));
    }
    public function index(){
        $container=Container::with('port','container_line','container_type')->get();
        return view('setup.container.container',compact($container,'container'));
    }
    public function store(Request $request){
        // $request->validate([
        //     'code'               =>  'required',
        //     'description'        =>  'required',
        //     'cost'               =>  'required|numeric',
        //     'supplier'           =>  'required',
        // ]);

        $container=new Container;
        $container->code=$request->code;
        $container->description=$request->description;
        $container->container_type_id=$request->container_type_id;
        $container->cost=$request->cost;
        $container->company_id=$request->company_id;
        $container->pur_port_id=$request->pur_port_id;
        $container->supplier=$request->supplier;
        $container->save();
        return redirect()->route('container');
    }

    public function edit($id){
        $isEdit=true;
        $container_line=ContainerLine::all();
        $container_type=ContainerType::all();
        $port=Port::all();
        $container=Container::with('port','container_line','container_type')->find($id);
        return view('setup.container.create',compact($container,'container',$isEdit,'isEdit',$container_line,'container_line',$port,'port',$container_type,'container_type'));
    }

    public function update(Request $request,$id){
        // $request->validate([
        //     'code'               =>  'required',
        //     'description'        =>  'required',
        //     'cost'               =>  'required|numeric',
        //     'supplier'           =>  'required',
        // ]);
        $container=Container::find($id);
        // $container->name=$request->name;
        $container->code=$request->code;
        $container->description=$request->description;
        $container->container_type_id=$request->container_type_id;
        $container->cost=$request->cost;
        $container->company_id=$request->company_id;
        $container->pur_port_id=$request->pur_port_id;
        $container->supplier=$request->supplier;
        $container->save();
        return redirect()->route('container');
    }
}
