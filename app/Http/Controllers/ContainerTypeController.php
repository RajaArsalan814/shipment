<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContainerType;
class ContainerTypeController extends Controller
{
    public function create(){
        $isEdit=false;
        return view('setup.container_type.create',compact($isEdit,'isEdit'));
    }

    public function index(){
        $container_type=ContainerType::all();
        return view('setup.container_type.container_type',compact($container_type,'container_type'));
    }

    public function store(Request $request){

    // return $request->all();    // $request->validate([
        //     'code'        =>  'required',
        //     'name'        =>  'required',
        //     'address'     =>  'required',
        //     'contact_no'  =>    'required|numeric',
        //     'fax_no'      =>  'required',
        //     'email'       =>  'required',
        //     'url'         =>  'required',
        // ]);
        $containertype=new ContainerType;
        $containertype->container_size=$request->container_size;
        $containertype->save();
        return redirect()->route('container_type');
    }

    public function edit($id){
        $isEdit=true;
        $container_type=ContainerType::find($id);
        return view('setup.container_type.create',compact($container_type,'container_type',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){

        $container_type=ContainerType::find($id);
        $container_type->container_size=$request->container_size;
        $container_type->save();
        return redirect()->route('container_type');
    }
}
