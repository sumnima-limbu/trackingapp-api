@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class='card-title mt-0'>User Profile</h4>
                        <p class="card-category">This is subtitle....</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive col-lg-8 offset-md-2">
                            <table class="table col-md-8 mt-5">
                                <thead class="text-primary">
                                    <tr>
                                        <th width="15"></th>
                                        <th> ID </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Password </th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>{{ $LoggedUserInfo['id'] }}</td>
                                        <td>{{ $LoggedUserInfo['name'] }}</td>
                                        <td>{{ $LoggedUserInfo['email'] }}</td>
                                        <td></td>
                                </thead>
                            </table>
                            
                        </div>
                        {{-- <div class="mt-5 col-lg-12">
                            <hr />
                        </div>
                        <button type ="submit" class="btn btn-primary pull-right" href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </button>                    
                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                            @csrf     
                        </form>    --}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Profile</div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $LoggedUserInfo['name'] }}</td>
                            <td>{{ $LoggedUserInfo['email'] }}</td>
                        </tr>        
                    </tbody>
                </table>

            </div>
        </div> --}}
   
@endsection