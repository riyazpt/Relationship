@extends('layouts.master')
@section('content')
<div class="container">



    {{ Form::open(array('url' => 'company','class'=>"form-horizontal")) }}

    <div class="form-group">
        {{ Form::label('company_name', 'Company Name',array('class'=>'control-label col-sm-2')) }}
        <div class="col-sm-5">
            {{ Form::text('company_name', Input::old('company_name'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('company_address', 'Company Address',array('class'=>'control-label col-sm-2')) }}
        <div class="col-sm-5">
            {{ Form::textarea('company_address', Input::old('company_address'), array('class' => 'form-control','rows'=>'5')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-5 pull-right">
            
            {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
@stop