@extends('layouts.app1')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="{{ url("users/{$user->id}") }}" method="post">
                @csrf
                {{ method_field('patch') }}
                @include('users.partials._create',['user' => $user])
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>

@append

@section('scripts')
    <script>
        $('#dob').daterangepicker({
            locale : {
                format:'DD-MM-YYYY',
            },
            timepicker:false,
            singleDatePicker: true,
            autoUpdateInput: false,
            autoApply: true,
            showDropdowns: true,
        },function (start) {
            $('#dob').val(start.format('DD-MM-YYYY'));
        })
    </script>
@append
