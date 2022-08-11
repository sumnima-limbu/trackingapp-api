@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add User</h4>
                        <p class="card-category">Enter new user details ...</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-8 offset-md-2 mt-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="form-label">Name
                                        </label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8 offset-md-2">
                                    <div class="form-group bmd-form-group">
                                        <label class="form-label">Email
                                        </label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8 offset-md-2">
                                    <div class="form-group bmd-form-group">
                                        <label class="form-label">Date of Birth
                                        </label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8 offset-md-2">
                                    <div class="form-group bmd-form-group">
                                        <label class="form-label">Phone Number
                                        </label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8 offset-md-2 mb-3">
                                    <div class="form-group bmd-form-group">
                                        <label class="form-label">Password
                                        </label>
                                        <input type="password" id="inputPassword5" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 col-lg-12">
                                 <hr />
                            </div>
                           
                            <button type="submit" class="btn btn-primary pull-right">Add User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection