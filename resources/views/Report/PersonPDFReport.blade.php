<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="container">
<h5>Company List</h5>
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>SlNo</th>
                <th>Firt Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Actions</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contactPersons as $contactPerson)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{$contactPerson->first_name}}</td>
                <td>{{$contactPerson->last_name}}</td>
               
                <td>{{$contactPerson->company->company_name}}</td>
                
        
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
