@extends('master.layout')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            Port
        <small>preview of port </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setup</a></li>
        <li class="active">Port View</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Port View</h3>

              <div class="box-tools">
                <div class="input-group input-group-md hidden-xs col-md-offset-7" style="width: 150px;">

                  <div class="input-group-btn">
                    <a href="{{route('port')}}" class="btn btn-primary ">Back</a>
                    {{--  <button type="submit" class="btn btn-primary">Create</button>  --}}
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                {{-- <div class="container"> --}}
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="">Code</label>
                                <input type="text"  disabled="true" class="form-control" value="{{$port->code}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Port Name</label>
                                    <input type="text" disabled="true" class="form-control" value="{{$port->name}}">
                                </div>
                            </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" disabled="true" class="form-control" value="{{$port->address}}">
                                    </div>
                                </div>  
                                <div class="col-md-4">
                                    <label for="">Import</label>
                                    <ul class="list-group">
                                        @foreach ($port_charges->where('charges.charge_type','I') as $item)                                            
                                        <li class="list-group-item active">{{$item->charges->description}} :  &nbsp;&nbsp;  {{$item->amount}} </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Export</label>
                                        <ul class="list-group">
                                                @foreach ($port_charges->where('charges.charge_type','E') as $item)                                            
                                                <li class="list-group-item active">{{$item->charges->description}} :  &nbsp;&nbsp; {{$item->amount}}</li>
                                                @endforeach
                                        </ul>
                                    </div>
                        </div>
                    </div>
                </div>
                
            {{-- </div> --}}
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
