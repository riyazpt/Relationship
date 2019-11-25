@extends('layouts.master')
@section('content')
<div class="container">
    <h1>Company List</h1>
    
    <table class="table table-bordered" id="company-table">

        <thead>
            <tr>
                
                <th>Company Name</th>
                  <th>Company Address</th>
                  <th>Contact Person</th>
                  <th>Contact Person Address</th>
                  
               
                
            </tr>
        </thead>
      
    </table>
   
</div>
@endsection
@section('js')
<script>
$(function() {
   
    $('#company-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!!  URL::to('/anyCompanyData') !!}',
        columns: [
           { data: 'company_name', name: 'company_name' },
           { data: 'company_address', name: 'company_address' },
           { data: 'first_name', name: 'first_name' },
           { data: 'address', name: 'address' },
          
          
           
            
        ]
    });
});
</script>
@endsection
