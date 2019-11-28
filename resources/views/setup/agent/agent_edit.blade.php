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
            agent
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setup</a></li>
            <li class="active">agent</li>
          </ol>
        </section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="box box-danger">
        <div class="box-header">
          {{--  <h3 class="box-title">Input masks</h3>  --}}
        </div>
        <div class="box-body">

        <form action="
        {{route('agent.update',['id'=>$agent->id])}}
        " method="POST">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Code:</label>
                    <input type="text" name="code"  value="{{$agent->code}}" class="form-control" >
                    <span class="text-danger">{{$errors->first('code') ?? null}}</span>
                </div>
            </div>
         

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Name:</label>
                        <input type="text" name="name" class="form-control"  value="{{$agent->name}}">
                        <span class="text-danger">{{$errors->first('name') ?? null}}</span>
                    </div>
                </div>
{{--
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">agent Type:</label>
                        <select name="agent_type_id" id="" class="form-control">
                            <option disabled="true" selected>Select agent Type</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
            </div>  --}}
            @csrf
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Contact No:</label>
                        <input type="text" name="contact_no" class="form-control" value="{{$agent->contact_no}}">
                        <span class="text-danger">{{$errors->first('contact_no') ?? null}}</span>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Fax No:</label>
                        <input type="text" name="fax_no" class="form-control"  value="{{$agent->fax_no}}">
                        <span class="text-danger">{{$errors->first('fax_no') ?? null}}</span>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Email:</label>
                        <input type="text" name="email" class="form-control" value="{{$agent->email}}">
                        <span class="text-danger">{{$errors->first('email') ?? null}}</span>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Contact Person:</label>
                        <input type="text" name="contact_person" class="form-control" value="{{$agent->contact_person}}">
                        <span class="text-danger">{{$errors->first('contact_person') ?? null}}</span>
                    </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact">User Name:</label>
                    <input type="text" name="user_name" class="form-control" value="{{$agent->user_name}}">
                    <span class="text-danger">{{$errors->first('user_name') ?? null}}</span>
                </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                        <label for="code">Port:</label>
                        <select name="port_id" class="form-control">
                            <option disabled="true" selected>Select Port</option>
                            @foreach ($port as $item)
                            <option 
                            @if($item->id == $agent->port_id)
                            selected
                            @endif
                            value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
            </div>
        </div>
   <div class="col-md-12">
                <div class="form-group">
                    <label for="code">Address:</label>
                    <textarea name="address" id="" class="form-control" cols="30" rows="3">{{$agent->address}}</textarea>
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

                            <div class="input-group control-group after-add-more ">
                                <div class="col-md-3">
                                    <label for="">Charges</label>
                                  <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Import</button>
                                </div>

                              </div>



                              <!-- Copy Fields -->
                              <div class="copy hide">
                                <div class="control-group input-group" style="margin-top:10px">
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
                                    <div class="col-md-3">
                                      <label for="">Export</label>
                                      <button class="btn btn-success  export-add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Export</button>
                                    </div>
                                    </div>



                                  <!-- Copy Fields -->
                                  <div class="export-copy hide">
                                    <div class="export-control-group input-group" style="margin-top:10px">
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
               </div>



            <div class="col-md-3 col-md-offset-5">
                    <a href="{{route('agent')}}" class="btn btn-primary">Back</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary ">
                            Update
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
