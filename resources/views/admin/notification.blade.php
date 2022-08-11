@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Notifications Table</h4>
                        <p class="card-category">View all notifications ...</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="10"></th>
                                        <th></th>
                                        <th></th>
                                        <th> &nbsp; </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $key => $notification) 
                                        <tr>
                                            <td></td>
                                            <td>{{ $notification->id ?? '' }}</td>
                                            <td>{{ $notification->message ?? ''}}</td>
                                            <td>{{ $notification->type ?? '' }}</td>
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