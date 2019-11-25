@extends('layouts.master')
@section('content')
<div class="container">



    <div class="col-sm-9">
    {{ Form::model($address, array('route' => array('address.update', $address->address_id,), 'method' => 'PUT','class'=>"form-horizontal")) }}

   
    <div class="form-group">
        {{ Form::label('address', 'Address',array('class'=>'control-label col-sm-2')) }}
        <div class="col-sm-5">
            {{ Form::textarea('address', Input::old('address'), array('class' => 'form-control','rows'=>'5')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-5 pull-right">
            
            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
        </div>
    </div>
    {{ Form::close() }}
    </div>
</div>
@stop