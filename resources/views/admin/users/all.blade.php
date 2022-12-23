@extends('layouts.app')

@section('title', 'All Users')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3><a href="#">Create User</a></h3>
            <h2>Users</h2>
   
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="20%">Name</th>
                        <th width="40%">Email</th>
                        <th width="20%">Role</th>
                        <th width="10%">Details</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td><a href="#">Details</a></td>
                    </tr> 
                @endforeach
                </tbody>
            </table>
          
        </div>
    </div>  
@endsection
