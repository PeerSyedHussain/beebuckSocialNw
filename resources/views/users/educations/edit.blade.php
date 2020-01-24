@extends('layouts.app1')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="{{ url("users/{$user->id}/education-details/{$education->id}") }}" method="post">
                @csrf
                {{ method_field('PATCH') }}
                @include('users.educations.partials._create',['education' => $education])
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>

@append

@section('scripts')
    <script>
        $(function () {
            $('.select2').select2({
                placeholder: "Select Year",
                allowClear: true
            });
        });
    </script>
@append

