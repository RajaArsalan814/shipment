<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Container;
class ContainerController extends Controller
{
    public function create(){
        $isEdit=false;
        return view('setup.container.create',compact($isEdit,'isEdit'));
    }
    public function index(){
        $container=Container::all();
        return view('setup.container.container',compact($container,'container'));
    }
    public function store(Request $request){
        $request->validate([
            'code'               =>  'required',
            'description'        =>  'required',
            'cost'               =>  'required|numeric',
            'supplier'           =>  'required',
        ]);

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
        $container=Container::find($id);
        return view('setup.container.create',compact($container,'container',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'code'               =>  'required',
            'description'        =>  'required',
            'cost'               =>  'required|numeric',
            'supplier'           =>  'required',
        ]);
        $container=Container::find($id);
        $container->name=$request->name;
        $container->address=$request->address;
        $container->contact_no=$request->contact_no;
        $container->code=$request->code;
        $container->contact_person=$request->contact_person;
        $container->user_id='1';
        $container->save();
        return redirect()->route('container');
    }
}
