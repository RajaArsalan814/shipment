@extends('master.layout')
@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Voyage
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setup</a></li>
            <li class="active">Voyage</li>
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
        {{route('voyage.update',['id'=>$voyage->id])}}
        @else
        {{route('voyage.store')}}
        @endif
        " method="POST">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Code:</label>
                    @if($isEdit==true)
                    <input type="text" name="code" class="form-control" value="{{$voyage->code}}" >
                    @else
                    <input type="text" name="code" class="form-control" >
                    @endif
                    <span class="text-danger">{{$errors->first('code') ?? null}}</span>
                </div>
            </div>


            <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Vessel Type:</label>
                        @if($isEdit==true)
                        <select name="vessel_id" id="" class="form-control">
                          @foreach ($vessel as $item)
                          <option
                          @if($item->id==$voyage->vessel_id)
                          selected
                          @endif
                          value="{{$item->id}}">{{$item->code}}</option>
                      @endforeach
                      </select>
                        @else
                        <select name="vessel_id" id="" class="form-control">
                          <option disabled="true" selected>Select Voyage Type</option>
                          @foreach ($vessel as $item)
                          <option value="{{$item->id}}">{{$item->code}}</option>
                      @endforeach
                      </select>
                        @endif

                    </div>
            </div>
            @csrf
         
                <div class="col-md-6">
                  <div class="form-group">
                              <label for="code">ETD Date:</label>
                              @if($isEdit==true)
                              <input type="date" class="form-control" name="etd_date" value="{{$voyage->etd_date}}">
                              @else
                              <input type="date" class="form-control" name="etd_date" >
                              @endif
                             
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                            <label for="code">ETA Date:</label>
                            @if($isEdit==true)
                            <input type="date" class="form-control" name="eta_date" value="{{$voyage->eta_date}}">
                            @else
                            <input type="date" class="form-control" name="eta_date" >
                            @endif
                           
                </div>
            </div>
       
            <div class="col-md-6">
                    <div class="form-group">
                            <label for="code">Loading Port:</label>
                            @if($isEdit==true)
                            <select name="loading_port_id" id="" class="form-control">
                              <option disabled="true" selected>Select Port</option>
                              @foreach ($port as $item)
                                  <option 
                                  @if($item->id==$voyage->loading_port_id)
                                  selected
                                  @endif
                                  value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                          </select>
                            @else
                            <select name="loading_port_id" id="" class="form-control">
                              <option disabled="true" selected>Select Port </option>
                              @foreach ($port as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                          </select>
                            @endif

                      </div>
            </div>


              
            <div class="col-md-6">
              <div class="form-group">
                      <label for="code">Destination Port:</label>
                      @if($isEdit==true)
                      <select name="destination_port_id" id="" class="form-control">
                        <option disabled="true" selected>Select Port</option>
                        @foreach ($port as $item)
                            <option 
                            @if($item->id==$voyage->destination_port_id)
                            selected
                            @endif
                            value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                      @else
                      <select name="destination_port_id" id="" class="form-control">
                        <option disabled="true" selected>Select Port </option>
                        @foreach ($port as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                      @endif

                </div>
      </div>
            <div class="col-md-6">
                <div class="form-group">
                        <label for="url">Final Destination:</label>
                        @if($isEdit==true)
                        <input type="text" name="final_destination" class="form-control" value="{{$voyage->final_destination}}" >
                        @else
                        <input type="text" name="final_destination" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('final_destination') ?? null}}</span>

                </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                      <label for="code">Slot Oprtator:</label>
                      @if($isEdit==true)
                      <select name="slot_operator_id" id="" class="form-control">
                        <option disabled="true" selected>Select Port</option>
                        @foreach ($port as $item)
                            <option 
                            {{--  @if($item->id==$voyage->port->id)
                            selected
                            @endif  --}}
                            value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                      @else
                      <select name="slot_operator_id" id="" class="form-control">
                        <option disabled="true" selected>Select Port </option>
                        @foreach ($port as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                      @endif

                </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
            <label for="contact">Slot Rate:</label>
            @if($isEdit==true)
            <input type="text" name="slot_rate" class="form-control" value="{{$voyage->slot_rate}}" >
            @else
            <input type="text" name="slot_rate" class="form-control" >
            @endif
            <span class="text-danger">{{$errors->first('slot_rate') ?? null}}</span>
        </div>
    </div>


    <div class="col-md-6">
      <div class="form-group">
              <label for="code">Slot Payment By:</label>
              @if($isEdit==true)
              <select name="slot_payment_by" id="" class="form-control">
                <option disabled="true" selected>Select Port</option>
                @foreach ($port as $item)
                    <option 
                    {{--  @if($item->id==$voyage->port->id)
                    selected
                    @endif  --}}
                    value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
              @else
              <select name="slot_payment_by" id="" class="form-control">
                <option disabled="true" selected>Select Port </option>
                @foreach ($port as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
              @endif

        </div>
</div>

<div class="col-md-6">
  <div class="form-group">
      <label for="contact">Terminal Name:</label>
      @if($isEdit==true)
      <input type="text" name="terminal_name" class="form-control" value="{{$voyage->terminal_name}}" >
      @else
      <input type="text" name="terminal_name" class="form-control" >
      @endif
      <span class="text-danger">{{$errors->first('terminal_name') ?? null}}</span>
  </div>
</div>


<div class="col-md-6">
  <div class="form-group">
      <label for="contact">THC Amount:</label>
      @if($isEdit==true)
      <input type="text" name="thc_amount" class="form-control" value="{{$voyage->thc_amount}}" >
      @else
      <input type="text" name="thc_amount" class="form-control" >
      @endif
      <span class="text-danger">{{$errors->first('thc_amount') ?? null}}</span>
  </div>
</div>


<div class="col-md-6">
  <div class="form-group">
      <label for="contact">Slot Operation Paid:</label>
      @if($isEdit==true)
      <input type="text" name="slot_operation_paid" class="form-control" value="{{$voyage->slot_operation_paid}}" >
      @else
      <input type="text" name="slot_operation_paid" class="form-control" >
      @endif
      <span class="text-danger">{{$errors->first('slot_operation_paid') ?? null}}</span>
  </div>
</div>

            <div class="col-md-3 col-md-offset-5">
                    <a href="{{route('voyage')}}" class="btn btn-primary">Back</a>
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
  </div>

</section>
</div>
@endsection
