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
        @if($isEdit==true)
        {{route('agent.update',['id'=>$agent->id])}}
        @else
        {{route('agent.store')}}
        @endif
        " method="POST">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Code:</label>
                    @if($isEdit==true)
                    <input type="text" name="code" class="form-control" value="{{$agent->code}}" >
                    @else
                    <input type="text" name="code" class="form-control" >
                    @endif
                    <span class="text-danger">{{$errors->first('code') ?? null}}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Address:</label>
                    <textarea name="address" id="" class="form-control" cols="30" rows="5"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Name:</label>
                        @if($isEdit==true)
                        <input type="text" name="name" class="form-control" value="{{$agent->name}}" >
                        @else
                        <input type="text" name="name" class="form-control" >
                        @endif
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
                        @if($isEdit==true)
                        <input type="text" name="contact_no" class="form-control" value="{{$agent->contact_no}}" >
                        @else
                        <input type="text" name="contact_no" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('contact_no') ?? null}}</span>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Fax No:</label>
                        @if($isEdit==true)
                        <input type="text" name="fax_no" class="form-control" value="{{$agent->fax_no}}" >
                        @else
                        <input type="text" name="fax_no" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('fax_no') ?? null}}</span>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Email:</label>
                        @if($isEdit==true)
                        <input type="text" name="email" class="form-control" value="{{$agent->email}}" >
                        @else
                        <input type="text" name="email" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('email') ?? null}}</span>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Contact Person:</label>
                        @if($isEdit==true)
                        <input type="text" name="contact_person" class="form-control" value="{{$agent->contact_person}}" >
                        @else
                        <input type="text" name="contact_person" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('contact_person') ?? null}}</span>
                    </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact">User Name:</label>
                    @if($isEdit==true)
                    <input type="text" name="contact_person" class="form-control" value="{{$agent->contact_person}}" >
                    @else
                    <input type="text" name="contact_person" class="form-control" >
                    @endif
                    <span class="text-danger">{{$errors->first('contact_person') ?? null}}</span>
                </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                        <label for="code">Port:</label>
                        <select name="company_id" id="" class="form-control">
                            <option disabled="true" selected>Select Port</option>
                            @foreach ($port as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                        <label for="code">Charges:</label>
                        <select name="company_id" id="" class="form-control">
                            <option disabled="true" selected>Select Charges</option>
                            @foreach ($port as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
            </div>
        </div>

            <div class="col-md-3 col-md-offset-5">
                    <a href="{{route('agent')}}" class="btn btn-primary">Back</a>
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
@endsection
<script>

</script>
