<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="container">
<h5>Company List</h5>
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>SlNo</th>
                <th>Company Name</th>
                <th>Company Address</th>
            </tr>
        </thead>
        <tbody>
             @if($companies->count()>0)
            @foreach($companies as $company)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{$company->company_name}}</td>
                <td>{{$company->company_address}}</td>

            </tr>
            @endforeach
             @else
            <tr><td colspan="7"><div class="text-center">No Company to show!</div></td></tr>
            @endif
        </tbody>
    </table>


</div>
