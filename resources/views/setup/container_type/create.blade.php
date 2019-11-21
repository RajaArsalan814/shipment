@extends('master.layout')
@section('content')
{{--  @if ($errors->any())  --}}
{{--  {{$errors->first()}}  --}}
{{--  @endif  --}}
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Container Line Detail
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setup</a></li>
            <li class="active">Container Line</li>
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
        {{route('container_type.update',['id'=>$container_type->id])}}
        @else
        {{route('container_type.store')}}
        @endif
        " method="POST">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Container Size:</label>
                    @if($isEdit==true)
                    <input name="container_size" type="text" class="form-control" value="{{$container_type->container_size}}">
                    @else
                    <input name="container_size" type="text" class="form-control" >
                    @endif
                    {{--  <span class="text-danger">{{$errors->first('code') ?? null}}</span>  --}}
                </div>
            </div>


        
            @csrf
        

        <div class="col-md-3 col-md-offset-5">
            <a href="{{route('container_lines')}}" class="btn btn-primary">Back</a>
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
