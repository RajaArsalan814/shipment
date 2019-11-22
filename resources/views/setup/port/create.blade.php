<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
{{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .tab-pane {
        padding:20px;
    }
</style>
@extends('master.layout')
@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Port Detail
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setup</a></li>
            <li class="active">Port</li>
          </ol>
        </section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="box box-danger">
        <div class="box-header">
        </div>
        <div class="box-body">

        <form action="
        @if($isEdit==true)
        {{route('port.update',['id'=>$port->id])}}
        @else
        {{route('port.store')}}
        @endif
        " method="POST">

        <div class="field_wrapper">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="code">Code:</label>
                    @if($isEdit==true)
                    <input type="text" name="code" class="form-control" value="{{$port->code}}" >
                    @else
                    <input type="text" name="code" class="form-control"  >
                    @endif
                    <span class="text-danger">{{$errors->first('code') ?? null}}</span>
                </div>
            </div>

            <div class="col-md-3">
                    <div class="form-group">
                        <label for="code">Name:</label>
                        @if($isEdit==true)
                        <input type="text" name="name" class="form-control" value="{{$port->name}}" >
                        @else
                        <input type="text" name="name" class="form-control"  >
                        @endif
                        <span class="text-danger">{{$errors->first('name') ?? null}}</span>
                    </div>
            </div>

            @csrf
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact">Address</label>
                        @if($isEdit==true)
                        <input type="text" name="address" class="form-control" value="{{$port->address}}" >
                        @else
                        <input type="text" name="address" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('address') ?? null}}</span>
                    </div>
            </div>

        

           <div class="col-md-12">
                        
            <ul class="nav nav-tabs" id="myForm">
                <li><a href="#one">Import</a></li>
                <li><a href="#two">Export</a></li>
            </ul>

            {{-- <form action="" method="post"> --}}
                <div class="tab-content">
                <div class="tab-pane " id="one">
                    <div class="row">
                        <div class="col-md-3">
                                <label for="">Import</label>
                            <select name="charges_id[]" id="" class="form-control">
                                <option value="">Select Import Type</option>
                                @foreach ($charges_import as $item)
                                <option value="{{$item->id}}">{{$item->description}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                                <label for="">Charges</label>
                            <input type="text" class="form-control" name="amount[]" placeholder="Enter Charges">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="two">
                        <div class="row">
                                <div class="col-md-3">
                                    <label for="">Export</label>
                                <select name="charges_id[]" id="" class="form-control">
                                    <option value="">Select Export Type</option>
                                    @foreach ($charges_export as $item)
                                            <option value="{{$item->id}}">{{$item->description}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-md-3">
                                <label for="">Charges</label>
                                <input type="text" class="form-control" name="amount[]" placeholder="Enter Charges">
                                </div>
                        </div>
                </div>
                <div class="tab-pane" id="three">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>    
                </div>
            {{-- </form> --}}
           </div>

  

            </div>
<br><br>
        <div class="col-md-3 col-md-offset-3">
            <a href="{{route('port')}}" class="btn btn-primary">Back</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary ">
                    @if($isEdit==true)
                    Update
                    @else
                    Create
                    @endif
            </button>
        </div>
        </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <!-- /.box -->

    </div>
    <!-- /.col (left) -->

    <!-- /.col (right) -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
</div>
<script>
        $('#myForm a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
          })
    </script>
@endsection
