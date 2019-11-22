{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

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

                        <div class="input-group control-group after-add-more">
                            <input type="text" name="charges_id[]" class="form-control" placeholder="Enter Import Charges Here">
                            <div class="input-group-btn"> 
                              <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Import</button>
                            </div>
                          </div>
                  
                  
                  
                          <!-- Copy Fields -->
                          <div class="copy hide">
                            <div class="control-group input-group" style="margin-top:10px">
                              <input type="text" name="charges_id[]" class="form-control" placeholder="Enter Charges Here">
                              <div class="input-group-btn"> 
                                <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                              </div>
                            </div>
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

                            <div class="input-group control-group export-after-add-more">
                                <input type="text" name="charges_id[]" class="form-control" placeholder="Enter Export Charges Here">
                                <div class="input-group-btn"> 
                                  <button class="btn btn-success " type="button"><i class="glyphicon glyphicon-plus"></i> Export</button>
                                </div>
                              </div>
                      
                      
                      
                              <!-- Copy Fields -->
                              <div class="export-copy hide">
                                <div class="export-control-group input-group" style="margin-top:10px">
                                  <input type="text" name="charges_id[]" class="form-control" placeholder="Enter Export Charges Here">
                                  <div class="input-group-btn"> 
                                    <button class="btn btn-danger export-remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                  </div>
                                </div>
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
    </div>


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
     

    $(document).ready(function() {


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


      
      $(".export-add-more").click(function(){ 
          var html = $(".export-copy").html();
          $(".export-after-add-more").after(html);
      });


      $("body").on("click",".export-remove",function(){ 
          $(this).parents(".export-control-group").remove();
      });


    });

        $('#myForm a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
          })
    </script>
@endsection
