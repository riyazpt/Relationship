@extends('layouts.master')
@section('content')
<div class="container">
    <h1>Address List</h1>
    <div class="pull-right"><a  class="btn btn-primary" href="{{ URL::to('address/create') }}">Create</a></div>
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>SlNo</th>
              
                <th>Address</th>
                
                <th colspan="2">Actions</th>

            </tr>
        </thead>
        <tbody>
            @if($Adresses->count()>0)
                @foreach($Adresses as $Adress)
                <tr>
                    <td>{{ $loop->iteration}}</td>

                    <td>{{$Adress->address}}</td>

                    <td>
                        <div class="sm-8">
                            <a  class="btn btn-warning" href="{{ URL::to('address/'.$Adress->address_id.'/edit') }}">Edit</a>

                    </td>
                    <td>
                        <form action="{{ route('address.destroy', $Adress->address_id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}



                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}


                        </form>
                        </div>
                    </td>

                </tr>
                @endforeach
                @else
                <tr><td colspan="7"><div class="text-center">No Data to show!</div></td></tr>
            @endif
        </tbody>
    </table>
    
</div>
@stop