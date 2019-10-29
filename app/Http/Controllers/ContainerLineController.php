<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContainerLine;
class ContainerLineController extends Controller
{
    public function create(){
        $isEdit=false;
        return view('setup.container_lines.create',compact($isEdit,'isEdit'));
    }

    public function index(){
        $container_line=ContainerLine::all();
        return view('setup.container_lines.container_lines',compact($container_line,'container_line'));
    }

    public function store(Request $request){

        $request->validate([
            'code'        =>  'required',
            'name'        =>  'required',
            'address'     =>  'required',
            'contact_no'  =>    'required|numeric',
            'fax_no'      =>  'required',
            'email'       =>  'required',
            'url'         =>  'required',
        ]);
        $container_line=new ContainerLine;
        $container_line->code=$request->code;
        $container_line->name=$request->name;
        $container_line->address=$request->address;
        $container_line->contact_no=$request->contact_no;
        $container_line->fax_no=$request->fax_no;
        $container_line->email=$request->email;
        $container_line->url=$request->url;
        $container_line->user_id='1';
        $container_line->save();
        return redirect()->route('container_lines');
    }

    public function edit($id){
        $isEdit=true;
        $container_line=ContainerLine::find($id);
        return view('setup.container_lines.create',compact($container_line,'container_line',$isEdit,'isEdit'));
    }

    public function update(Request $request,$id){

        $container_line=ContainerLine::find($id);
        $container_line->code=$request->code;
        $container_line->name=$request->name;
        $container_line->address=$request->address;
        $container_line->contact_no=$request->contact_no;
        $container_line->fax_no=$request->fax_no;
        $container_line->email=$request->email;
        $container_line->url=$request->url;
        $container_line->user_id='2';
        $container_line->save();
        return redirect()->route('container_lines');
    }
}
