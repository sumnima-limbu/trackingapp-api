@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0">Circles Table</h4>
                        <p class="card-category">View all circles ...</p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Circles</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="15"></th>
                                        <th> ID </th>
                                        <th> Friend </th>
                                        <th> Status </th>
                                        <th> &nbsp; </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($circles as $key => $circle) 
                                        <tr>
                                            <td></td>                                  
                                            @forelse($circle->users as $user)
                                                <td>
                                                    {{ $user['name'] }}
                                                </td>
                                                <td>
                                                    {{ $user['email'] }}
                                                </td>
                                            @empty
                                            @endforelse                                  
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