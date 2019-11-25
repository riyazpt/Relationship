@extends('layouts.master')
@section('content')
<div class="container">
    <h1>Company List</h1>
    <div class="pull-right"><a  class="btn btn-primary" href="{{ URL::to('company/create') }}">Create</a></div>
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>SlNo</th>
                <th>Company Name</th>
                <th>Company Address</th>
                <th>Contact Person </th>
                <th>Address </th>
                <th colspan="2">Actions</th>

            </tr>
        </thead>
        <tbody>
            @if($companies->count()>0)
                @foreach($companies as $company)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{$company->company_name}}</td>
                    <td>{{$company->company_address}}</td>
                    <td>@if($company->contactpersons->count()>0)

                        {{ $company->contactpersons[0]['first_name']}}
                       
                        @endif



                    </td>
                    <td>
                       
                        @if($company->contactpersons->count()>0)
                        @foreach ($company->contactpersons as $contactperson)
                        @if($contactperson['address_id']==$contactperson->address['address_id'])
                            @if( $loop->iteration==1)
                            
                            {{$contactperson->address['address']}}
                             @endif
                        @endif


                        @endforeach
                        @endif



                    </td>
                    <td>
                        <div class="sm-8">
                            <a  class="btn btn-warning" href="{{ URL::to('company/'.$company->id.'/edit') }}">Edit</a>

                    </td>
                    <td>
                        <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}



                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}


                        </form>
                        </div>
                    </td>

                </tr>
                @endforeach
                @else
                <tr><td colspan="7"><div class="text-center">No Company to show!</div></td></tr>
            @endif
        </tbody>
    </table>
    <a class="btn btn-info pull-right" href="{{ route('generate-company-pdf',['download'=>'pdf']) }}">Download PDF </a>

</div>
@stop