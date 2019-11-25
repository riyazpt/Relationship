@extends('layouts.master')
@section('content')
<div class="container">
    <h1>Contacts</h1>
    <div class="pull-right"><a  class="btn btn-primary" href="{{ URL::to('person/create') }}">Create</a></div>
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>SlNo</th>
                <th>Firt Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th colspan="2">Actions</th>
                
            </tr>
        </thead>
        <tbody>
            @if($contactPersons->count()>0)
                @foreach($contactPersons as $contactPerson)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{$contactPerson->first_name}}</td>
                    <td>{{$contactPerson->last_name}}</td>

                    <td>
                        @if(!empty($contactPerson->company))
                        {{$contactPerson->company->company_name}}
                        @endif
                    
                    </td>

                    <td>

                        <a  class="btn btn-warning" href="{{ URL::to('person/'.$contactPerson->person_id.'/edit') }}">Edit</a>






                    </td>
                    <td>  <form action="{{ route('person.destroy',$contactPerson->person_id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}



                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}


                        </form></td>

                </tr>
                @endforeach
                
                @else
                <tr><td colspan="7"><div class="text-center">No Company to show!</div></td></tr>
            @endif
        </tbody>
    </table>
    
<a class="btn btn-info pull-right" href="{{ route('generate-contact-person-pdf',['download'=>'pdf']) }}">Download PDF </a>
</div>
@stop