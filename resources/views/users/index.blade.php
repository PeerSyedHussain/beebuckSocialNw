@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Salutation</th>
                        <th scope="col-md-2">First Name</th>
                        <th scope="col-md-2">Last Name</th>
                        <th scope="col-md-2">Nick Name</th>
                        <th scope="col-md-2">Date of Birth</th>
                        <th scope="col-md-2">User Name</th>
                        <th scope="col-md-2">Email</th>
{{--                        <th scope="col-md-2">Phone</th>--}}
{{--                        <th scope="col-md-2">Gender</th>--}}
{{--                        <th scope="col-md-2">Address</th>--}}
{{--                        <th scope="col-md-2">Bio</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                                <td class="">{{$user->id}}</td>
                                <td>{{$user->salutation}}</td>
                                <td>{{$user->f_name}}</td>
                                <td>{{$user->l_name}}</td>
                                <td>{{$user->nick_name}}</td>
                                <td>{{$user->dob}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
{{--                                <td>{{$user->phone}}</td>--}}
{{--                                <td>{{$user->gender}}</td>--}}
{{--                                <td>{{$user->address}}</td>--}}
{{--                                <td>{{$user->bio}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@append

@section('scripts')
    <script>

    </script>
@append

