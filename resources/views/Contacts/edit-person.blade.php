@extends('layouts.master')
@section('content')
<div class="container">




    {{ Form::model($person, array('route' => array('person.update', $person->person_id,), 'method' => 'PUT','class'=>"form-horizontal")) }}

    <div class="form-group">
        {{ Form::label('first_name', 'First Name',array('class'=>'control-label col-sm-2')) }}
        <div class="col-sm-5">
            {{ Form::text('first_name', Input::old('first_name'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('last_name', 'Last Name',array('class'=>'control-label col-sm-2')) }}
        <div class="col-sm-5">
            {{ Form::text('last_name', Input::old('last_name'), array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('company', 'Company:',array('class'=>'control-label col-sm-2')) !!}
        <div class="col-sm-5">
            <select class="form-control" name="company_id">
                @php($selectedID=$person->company_id)
                @foreach($companies as $company)
                <option value="{{$company->id}}"  {{ ( $company->id == $selectedID) ? 'selected' : '' }}>{{$company->company_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('Address', 'Address:',array('class'=>'control-label col-sm-2')) !!}
        <div class="col-sm-5">
            <select class="form-control" name="address_id">
                @php($selectedAddress=$person->address_id)
                @foreach($addresses as $address)

                <option value="{{$address->address_id}}"  {{ ( $address->address_id == $selectedAddress) ? 'selected' : '' }}>{{$address->address}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-5 pull-right">

            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
@stop