@extends('layouts.app1')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3">
            <form action="{{ url("users/{$user->id}/company-details") }}" method="post">
                @csrf
                @include('users.company.partials._create',['company' => new \App\Domains\Users\Models\CompanyDetail()])
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>

@append

@section('scripts')
    <script>
        $(function () {
            $('.select2').select2({
                placeholder : 'Select Year',
                allowClear: true
            });
        });
    </script>
@append

