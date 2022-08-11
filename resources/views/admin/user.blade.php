@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-3 ml-3">
                    <a href="{{ route('admin.create') }}" class="btn btn-success">
                        Add User
                    </a>
                </div>                
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">User Table</h4>
                        <p class="card-category">View all users</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="10"></th>
                                        <th> ID </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Phone Number </th>
                                        <th> &nbsp; </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td></td>
                                            <td>{{ $user->id ?? ''}} </td>
                                            <td>{{ $user->name ?? ''}} </td>
                                            <td>{{ $user->email ?? ''}} </td>
                                            <td>{{ $user->phone_number ?? ''}}</td>
                                            <td>
                                                <form 
                                                    action="{{ route('admin.delete', $user->id) }}" 
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this?');"
                                                    style="display: inline-block">
                                                    <input type="hidden" name="_method" value="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input class="btn btn-danger" type="submit" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection