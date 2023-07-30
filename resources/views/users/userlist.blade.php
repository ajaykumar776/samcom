@extends('layouts.main') <!-- Assuming you have a layout template -->

@section('content')
<div class="container">
    <div class="row d-flex mt-5">
        <div class="col-10">
            <h2>User Data Table</h2>
        </div>
        <div class="col-2" style="text-align: right;">
            <a href="/users/create" class="btn btn-primary float-right">Add New</a>
        </div>
    </div>
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Role</th>
                <th>Created At</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('usersData') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
            ],
            initComplete: function(settings, json) {
                // Print the response data to the console
                console.log(json);
            }
        });
    });
</script>
@endpush